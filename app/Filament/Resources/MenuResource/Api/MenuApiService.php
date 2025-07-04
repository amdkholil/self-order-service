<?php
namespace App\Filament\Resources\MenuResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\MenuResource;
use Illuminate\Routing\Router;


class MenuApiService extends ApiService
{
    protected static string | null $resource = MenuResource::class;

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
