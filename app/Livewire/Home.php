<?php

namespace App\Livewire;

use App\Enums\RegisterEmotion;
use Livewire\Component;
use OpenAI;

class Home extends Component
{

    public $name, $prompt;

    public function render()
    {
        return view('index');
    }

    public function responsePromt()
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
                    'role'      => 'user',
                    'content'   => 'Hoy me siento triste, lastimosamente me dí cuenta que mi pareja me estaba siendo infiel'
                ],
            ],
            'tools' => [$tools],
        ]);
        dd($response->toArray());
    }
}
