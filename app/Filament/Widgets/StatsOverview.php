<?php

namespace App\Filament\Widgets;

use App\Models\Register;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $desde = now()->subDay(); // desde ayer, por ejemplo
        $nuevos = DB::table('registers')
            ->where('created_at', '>=', $desde)
            ->distinct('id')
            ->count('id');


        return [
            Stat::make('Registros unicos', Register::count())
                ->description("+{$nuevos} increase")
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Emocion frecuente', Register::mostCommonValue()->emotion),
            Stat::make('Ultima emocion registrada', Register::mostCommonValue()->emotion),
        ];
    }

    public function getColumnSpan(): int|string|array
    {
        return 12;
    }
}
