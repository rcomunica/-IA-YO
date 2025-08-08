<?php

namespace App\Filament\Resources\ProfesionalResource\Pages;

use App\Filament\Resources\ProfesionalResource;
use Filament\Actions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateProfesional extends CreateRecord
{
    protected static string $resource = ProfesionalResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
            ]);
    }
}
