<?php
namespace App\Filament\Resources\DTableResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\DTableResource;
use App\Filament\Resources\DTableResource\Api\Requests\CreateDTableRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = DTableResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create DTable
     *
     * @param CreateDTableRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateDTableRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}