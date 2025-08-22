<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use function Pest\Laravel\get;

class Results extends Model
{
    use HasFactory;

    protected $appends = ['average_score'];

    public function register(): BelongsTo
    {
        return $this->belongsTo(Register::class);
    }

    public function getAverageScoreAttribute(): int
    {
        return round(($this->ia_score + $this->music_score + $this->profesional_score) / 3, 0);
    }

    public static function getBestScore($a, $b, $c)
    {
        $numeros = [
            'IA' => $a,
            'Musica' => $b,
            'Profesional' => $c,
        ];


        $mayor = max($numeros);   // obtiene el valor mayor
        $posicion = array_search($mayor, $numeros); // obtiene la "clave" del mayor

        return [
            'mayor' => $mayor,
            'posicion' => $posicion
        ];
    }

    public static function getPoorScore($a, $b, $c)
    {
        $numeros = [
            'IA' => $a,
            'Musica' => $b,
            'Profesional' => $c,
        ];

        // ⚡ eliminamos el mejor antes de buscar el menor
        $best = self::getBestScore($a, $b, $c);
        unset($numeros[$best['posicion']]);

        $mayor = min($numeros);   // obtiene el valor menor
        $posicion = array_search($mayor, $numeros); // obtiene la "clave" del mayor

        return [
            'mayor' => $mayor,
            'posicion' => $posicion
        ];
    }
}
