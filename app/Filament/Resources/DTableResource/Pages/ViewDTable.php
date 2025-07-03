<?php

namespace App\Filament\Resources\DTableResource\Pages;

use App\Filament\Resources\DTableResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDTable extends ViewRecord
{
    protected static string $resource = DTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
