<?php

namespace App\Filament\Resources\DTableResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\DTableResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\DTableResource\Api\Transformers\DTableTransformer;

class DetailHandler extends Handlers
{
    protected static bool $public = true;
    
    public static string | null $uri = '/{id}';
    public static string | null $resource = DTableResource::class;


    /**
     * Show DTable
     *
     * @param Request $request
     * @return DTableTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new DTableTransformer($query);
    }
}
