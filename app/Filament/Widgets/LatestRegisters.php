<?php

namespace App\Filament\Widgets;

use App\Models\Register;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestRegisters extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Register::query()
            )
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('emotion')
                    ->searchable(),
                TextColumn::make('song')
            ]);
    }

    public function getColumnSpan(): int|string|array
    {
        return 12;
    }
}
