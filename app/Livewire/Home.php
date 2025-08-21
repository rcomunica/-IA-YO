<?php

namespace App\Livewire;

use App\Enums\RegisterEmotion;
use App\Models\Register;
use App\Models\Results;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use OpenAI;

class Home extends Component
{

    public $name = "Andres", $prompt;

    public $message,
        $songName,
        $emotion,
        $email;

    public $videoId, $linkSong;

    public $bestSelection, $forumPorcent, $poorSelection;

    public $iaCalification,
        $musicCalification,
        $profesionalCalification,
        $activityCalification;

    public $textCalification;

    public $registerId;


    public function render()
    {
        return view('index');
    }

    public function connectOpenAi()
    {

        $feelings = array_map(
            fn($case) => $case->value,
            RegisterEmotion::cases()
        );

        $tools = [
            'type' => "function",
            'function' => [
                'name' => 'obtener_sentimiento',
                'description' => 'Analiza el texto y devuelve mensaje, canción recomendada preferiblmente en español y sentimiento',
                'parameters' => [
                    'type' => 'object',
                    'properties' => [
                        'mensaje' => [
                            'type' => 'string',
                            'description' => 'Respuesta completa y amigable',
                        ],
                        'cancion' => [
                            'type' => 'string',
                            'description' => 'Nombre de la canción recomendada de youtube preferiblente en español',
                        ],
                        'sentimiento' => [
                            'type' => 'string',
                            'enum' => $feelings
                        ],
                    ],
                    'required' => ['mensaje', 'cancion', 'sentimiento'],
                ],
            ]
        ];

        $apiKey = env('OPENAI_API_KEY');
        $client = OpenAI::client($apiKey);

        $response = $client->chat()->create([
            'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
            'temperature' => 0.7,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'El usuario se llama' . $this->name . ' , lo saludarás, vas a decirle su sentimiento, razones por las cuales se siente así y que consejo le das, recuerda dar una respuesta muy completa, dile como puede afrontar su sentimiento sea bueno o malo, recuerda devolver el nombre de la cancion preferiblemente en español, NO EL LINK',
                ],
                [
                    'role'      => 'user',
                    'content'   => $this->prompt,
                ],
            ],
            'tools' => [$tools],
        ]);

        $this->makeReponse($response);
    }

    public function makeReponse($response)
    {
        $toolCall = $response['choices'][0]['message']['tool_calls'][0];

        $arguments = json_decode($toolCall['function']['arguments'], true);


        // Almacenar resultados
        $this->message = $arguments['mensaje'];
        $this->songName = $arguments['cancion'];
        $this->emotion = $arguments['sentimiento'];


        // Assign video ID (function assing)
        $this->searchYoutubeVideo($this->songName);

        Log::info("NOMBRE: " . $this->name . implode(", ", $arguments));
        Log::info("Link song: $this->videoId");

        // Mostrar resultados
        $this->dispatch('register-created', $this->videoId);
    }

    public function finishForum()
    {

        // SAVE INFORMATION
        $this->saveData();

        $em = Register::where('emotion', $this->emotion)->count();

        $totalRegisters = Register::all()->count();

        $this->forumPorcent = $totalRegisters > 0
            ? round(($em / $totalRegisters) * 100, 0)
            : 0;

        // Resultados (sentimiento, afrontarlo, etc.)
        $this->bestSelection = Results::getBestScore($this->iaCalification, $this->musicCalification, $this->profesionalCalification);
        $this->poorSelection = Results::getPoorScore($this->iaCalification, $this->musicCalification, $this->profesionalCalification);
    }

    public function saveData()
    {

        // save register
        $register = new Register();

        $register->name = $this->name;
        $register->emotion = RegisterEmotion::tryFrom($this->emotion) ?? RegisterEmotion::Joy;
        $register->email = $this->email ?? '';
        $register->song = "https://www.youtube.com/watch?v={$this->videoId}";
        $register->save();

        // Asignar ID
        $this->registerId = $register->id;

        // Save results (calification)
        $result = new Results();
        $result->register_id = $register->id;
        $result->ia_score = $this->iaCalification ?? 0;
        $result->music_score = $this->musicCalification ?? 0;
        $result->profesional_score = $this->profesionalCalification ?? 0;
        $result->activity_score = $this->activityCalification ?? 0;

        $result->save();
    }

    public function searchYoutubeVideo($videoName)
    {
        $apiKey = env('GOOGLE_API');
        $url = 'https://www.googleapis.com/youtube/v3/search';

        $response = Http::get($url, [
            'part' => 'snippet',
            'q' => $videoName,
            'maxResults' => 1,
            'type' => 'video',
            'key' => $apiKey
        ]);

        if ($response->successful()) {
            $items = $response->json('items');
            if (!empty($items)) {
                return $this->videoId = $items[0]['id']['videoId'];
            }
        }

        return null;
    }


    public function generarPdf()
    {
        Register::updateOrCreate(['id' => $this->registerId], ['email' => $this->email]);
        // 📊 Traemos los datos igual que en el Controller
        $stats = [
            'ia' => Results::avg('ia_score'),
            'music' => Results::avg('music_score'),
            'profesional' => Results::avg('profesional_score'),
            'name' => $this->name,
        ];

        // Generamos PDF
        $pdf = Pdf::loadView('pdf.results', compact('stats'));

        // 👇 Devolvemos el PDF como descarga en Livewire
        return response()->streamDownload(
            fn() => print($pdf->output()),
            "estadisticas.pdf"
        );
    }
}
