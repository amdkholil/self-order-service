<?php

namespace App\Filament\Resources\DTableResource\Pages;

use App\Filament\Resources\DTableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDTables extends ListRecords
{
    protected static string $resource = DTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
