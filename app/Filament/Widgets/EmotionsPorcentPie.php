<?php

namespace App\Filament\Widgets;

use App\Models\Register;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class EmotionsPorcentPie extends ChartWidget
{
    protected static ?string $heading = 'Porcentaje de emociones (%)';

    protected function getData(): array
    {

        // Contar registros por emoción
        $emotions = Register::select('emotion', DB::raw('count(*) as total'))
            ->groupBy('emotion')
            ->pluck('total', 'emotion');

        $total = $emotions->sum();

        // Convertir a porcentajes
        $percentages = $emotions->map(function ($count) use ($total) {
            return round(($count / $total) * 100, 2); // 2 decimales
        });

        return [
            'datasets' => [
                [
                    'label' => 'Porcentaje de emociones',
                    'data' => $percentages->values(),
                    'backgroundColor' => [
                        '#FFCE56', // alegría
                        '#36A2EB', // tristeza
                        '#9966FF', // miedo
                        '#F44336', // enojo
                        '#FF9F40', // ansiedad
                        '#FF9F40', // vergüenza
                        '#E7E9ED', // culpa
                        '#8BC34A', // amor
                        '#FF6384', // envidia
                        '#00BCD4', // irritación
                    ],
                ],
            ],
            'labels' => $percentages->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    public function getColumnSpan(): int|string|array
    {
        return 6; // ocupa 6 de las 12 columnas
    }
}
