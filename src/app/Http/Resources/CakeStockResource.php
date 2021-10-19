<?php

namespace App\Http\Resources;

use App;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\CakeStockTransformer;

class CakeStockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return App::make(CakeStockTransformer::class)->transform($this);
    }
}
