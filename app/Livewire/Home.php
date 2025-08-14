<?php

namespace App\Livewire;

use App\Enums\RegisterEmotion;
use App\Models\Register;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use OpenAI;

class Home extends Component
{

    public $name, $prompt;

    public $message, $songName, $emotion;

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
                'description' => 'Analiza el texto y devuelve mensaje, canción recomendada y sentimiento',
                'parameters' => [
                    'type' => 'object',
                    'properties' => [
                        'mensaje' => [
                            'type' => 'string',
                            'description' => 'Respuesta completa y amigable',
                        ],
                        'cancion' => [
                            'type' => 'string',
                            'description' => 'Nombre de la canción recomendada de youtube',
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
                    'role' => 'developer',
                    'content' => 'El usuario se llama' . $this->name . ' , lo saludarás, vas a decirle su sentimiento, razones por las cuales se siente así y que consejo le das, recuerda dar una respuesta muy completa, dile como puede afrontar su sentimiento sea bueno o malo',
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


        // Registro DB
        $register = new Register();

        $register->name = $this->name;
        $register->emotion = RegisterEmotion::tryFrom($this->emotion) ?? RegisterEmotion::Joy;
        $register->email = "julir2772@gmail.com";
        $register->song = $this->searchYoutubeVideo($this->songName); // function
        $register->profesional_id = 1;

        $register->save();


        // Mostrar resultados


    }

    public function setAnswerIA($text)
    {
        //
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
                $videoId = $items[0]['id']['videoId'];
                return "https://www.youtube.com/watch?v={$videoId}";
            }
        }

        return null;
    }

    public function setFeelingVideo($feeling)
    {
        //
    }
}
