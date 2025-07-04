<?php

namespace App\Filament\Resources\MenuResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\MenuResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\MenuResource\Api\Transformers\MenuTransformer;

class DetailHandler extends Handlers
{
    protected static bool $public = true;
    
    public static string | null $uri = '/{id}';
    public static string | null $resource = MenuResource::class;


    /**
     * Show Menu
     *
     * @param Request $request
     * @return MenuTransformer
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

        return new MenuTransformer($query);
    }
}
