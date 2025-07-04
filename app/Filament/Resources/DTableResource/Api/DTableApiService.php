<?php
namespace App\Filament\Resources\DTableResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\DTableResource;
use Illuminate\Routing\Router;


class DTableApiService extends ApiService
{
    protected static string | null $resource = DTableResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
