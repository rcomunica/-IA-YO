<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ForoResultsResource\Pages;
use App\Filament\Resources\ForoResultsResource\RelationManagers;
use App\Models\ForoResults;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ForoResultsResource extends Resource
{
    protected static ?string $model = ForoResults::class;

    protected static ?string $navigationGroup = 'Resultados';
    protected static ?string $navigationLabel = 'Resultados foro';

    // protected static ?string $navigationIcon = 'heroicon-o-iconoir-xbox-x';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListForoResults::route('/'),
            'create' => Pages\CreateForoResults::route('/create'),
            'edit' => Pages\EditForoResults::route('/{record}/edit'),
        ];
    }
}
