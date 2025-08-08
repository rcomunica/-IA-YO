<?php

namespace App\Filament\Widgets;

use App\Models\Register;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Registros unicos', Register::count()),
            Stat::make('Emocion frecuente', Register::mostCommonValue()->emotion),
        ];
    }
}
