<?php

namespace App\Filament\Resources\DTableResource\Pages;

use App\Filament\Resources\DTableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDTable extends EditRecord
{
    protected static string $resource = DTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
