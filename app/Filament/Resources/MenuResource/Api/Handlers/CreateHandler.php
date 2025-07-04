<?php
namespace App\Filament\Resources\MenuResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\MenuResource;
use App\Filament\Resources\MenuResource\Api\Requests\CreateMenuRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = MenuResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Menu
     *
     * @param CreateMenuRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateMenuRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}