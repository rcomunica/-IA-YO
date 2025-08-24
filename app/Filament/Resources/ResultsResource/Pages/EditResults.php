<?php

namespace App\Filament\Resources\ResultsResource\Pages;

use App\Filament\Resources\ResultsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;

class EditResults extends EditRecord
{
    protected static string $resource = ResultsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Calificacion')
                    ->schema([
                        Select::make('ia_score')
                            ->options([
                                '1' => 'Definitivamente NO me gustó',
                                '2' => 'NO me gustó',
                                '3' => 'Me dió igual',
                                '4' => 'Me siento mejor',
                                '5' => 'Definitivamente me siento mejor',
                            ]),
                        Select::make('music_score')
                            ->options([
                                '1' => 'Definitivamente NO me gustó',
                                '2' => 'NO me gustó',
                                '3' => 'Me dió igual',
                                '4' => 'Me siento mejor',
                                '5' => 'Definitivamente me siento mejor',
                            ]),
                        Select::make('profesional_score')
                            ->options([
                                '1' => 'Definitivamente NO me gustó',
                                '2' => 'NO me gustó',
                                '3' => 'Me dió igual',
                                '4' => 'Me siento mejor',
                                '5' => 'Definitivamente me siento mejor',
                            ]),
                        Select::make('activity_score')
                            ->options([
                                '1' => 'Definitivamente NO me gustó',
                                '2' => 'NO me gustó',
                                '3' => 'Me dió igual',
                                '4' => 'Me siento mejor',
                                '5' => 'Definitivamente me siento mejor',
                            ]),
                    ]),
                RichEditor::make('text_calification')->columnSpan('full'),
            ]);
    }
}
