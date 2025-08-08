<?php

namespace App\Filament\Widgets;

use App\Enums\RegisterEmotion;
use App\Models\Register;
use Filament\Widgets\ChartWidget;

class EmotionRegisterChart extends ChartWidget
{
    protected static ?string $heading = 'Emociones';

    protected function getData(): array
    {
        $emociones = Register::pluck('emotion')
            ->map(fn($e) => $e->value) // o (string) $e
            ->countBy();

        $labels = collect(RegisterEmotion::cases())->map(fn($e) => $e->value)->toArray();
        $data = collect($labels)->map(fn($label) => $emociones[$label] ?? 0)->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Emociones comunes',
                    'data' => $data,
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
                    'borderColor' => [
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
                    ]
                ]
            ],
            'labels' => $labels
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
