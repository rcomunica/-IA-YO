<?php

namespace App\Filament\Resources\ForoResultsResource\Pages;

use App\Filament\Resources\ForoResultsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListForoResults extends ListRecords
{
    protected static string $resource = ForoResultsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
