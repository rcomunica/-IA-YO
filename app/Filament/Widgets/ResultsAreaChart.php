<?php

namespace App\Filament\Widgets;

use App\Models\Results;
use Filament\Widgets\ChartWidget;

class ResultsAreaChart extends ChartWidget
{
    protected static ?string $heading = 'Promedio de calificacion';

    protected function getData(): array
    {
        $averages = Results::selectRaw('
                AVG(ia_score) as ia_avg,
                AVG(music_score) as music_avg,
                AVG(profesional_score) as profesional_avg
            ')
            ->first();

        $labels = ['IA', 'Musica', 'Profesional'];

        $data = [
            round($averages->ia_avg ?? 0, 2),
            round($averages->music_avg ?? 0, 2),
            round($averages->profesional_avg ?? 0, 2),
        ];

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Promedio respuestas',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgb(54, 162, 235)',
                    'pointBackgroundColor' => 'rgb(54, 162, 235)',
                ]
            ],
        ];
    }

    protected function getType(): string
    {
        return 'radar';
    }

    public function getColumnSpan(): int|string|array
    {
        return 6; // ocupa 6 de las 12 columnas
    }
}
