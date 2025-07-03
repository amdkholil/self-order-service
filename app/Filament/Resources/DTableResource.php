<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DTableResource\Pages;
use App\Filament\Resources\DTableResource\RelationManagers;
use App\Models\Table;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table as FTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DTableResource extends Resource
{
    protected static ?string $model = Table::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Meja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Toggle::make('status')
                ->columnSpanFull()
                ->required(),
                Forms\Components\Textarea::make('description')
                ->columnSpanFull()
            ]);
    }

    public static function table(FTable $table): FTable
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->wrap()
                    ->sortable()
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListDTables::route('/'),
            'create' => Pages\CreateDTable::route('/create'),
            'view' => Pages\ViewDTable::route('/{record}'),
            'edit' => Pages\EditDTable::route('/{record}/edit'),
        ];
    }
}
