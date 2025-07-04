<?php
namespace App\Filament\Resources\DTableResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Table;

/**
 * @property DTable $resource
 */
class DTableTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
