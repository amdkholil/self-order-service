<?php
namespace App\Filament\Resources\DTableResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\DTableResource;
use App\Filament\Resources\DTableResource\Api\Transformers\DTableTransformer;

class PaginationHandler extends Handlers {
    protected static bool $public = true;
    
    public static string | null $uri = '/';
    public static string | null $resource = DTableResource::class;


    /**
     * List of DTable
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
        ->where('status', 1)
        ->paginate(request()->query('per_page'))
        ->appends(request()->query());

        return DTableTransformer::collection($query);
    }
}
