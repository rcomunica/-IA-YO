<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ReponsesOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Score promedio IA', 1),
            Stat::make('Score promedio MUSIC', 2),
            Stat::make('Score promedio Profesional', 3),
        ];
    }
}
