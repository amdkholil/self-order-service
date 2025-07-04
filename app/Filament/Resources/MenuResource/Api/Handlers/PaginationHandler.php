<?php
namespace App\Filament\Resources\MenuResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\MenuResource;
use App\Filament\Resources\MenuResource\Api\Transformers\MenuTransformer;

class PaginationHandler extends Handlers {
    protected static bool $public = true;
    
    public static string | null $uri = '/';
    public static string | null $resource = MenuResource::class;


    /**
     * List of Menu
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function handler()
    {
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for($query)
        ->allowedFields($this->getAllowedFields() ?? [])
        ->allowedSorts($this->getAllowedSorts() ?? [])
        ->allowedFilters($this->getAllowedFilters() ?? [])
        ->allowedIncludes($this->getAllowedIncludes() ?? [])
        ->paginate(request()->query('per_page'))
        ->appends(request()->query());

        return MenuTransformer::collection($query);
    }
}
