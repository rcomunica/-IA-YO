<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'emotion' => $this->emotion,
            'song' => $this->song,
            'profesional' => [
                'id' => $this->profesional->id,
                'name' => $this->profesional->name,
            ],
            'results' => [
                'ia_score' => $this->results->ia_score,
            ]
        ];
    }
}
