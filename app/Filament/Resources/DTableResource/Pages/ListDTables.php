<?php

namespace App\Filament\Resources\DTableResource\Pages;

use App\Filament\Resources\DTableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDTables extends ListRecords
{
    use \TomatoPHP\FilamentApi\Traits\InteractWithAPI;
    
    protected static string $resource = DTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
