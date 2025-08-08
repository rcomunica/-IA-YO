<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RegisterCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'Developer' => 'Julián Ramírez',
                'E-mail' => 'julir2772@gmail.com',
                'for' => "COLEGIO O.E.A IED FORO DISTRITAL 2025"
            ],
        ];
    }
}
