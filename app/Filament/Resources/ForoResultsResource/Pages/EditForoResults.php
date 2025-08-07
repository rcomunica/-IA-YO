<?php

namespace App\Filament\Resources\ForoResultsResource\Pages;

use App\Filament\Resources\ForoResultsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditForoResults extends EditRecord
{
    protected static string $resource = ForoResultsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
