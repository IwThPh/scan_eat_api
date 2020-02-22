<?php

namespace App\Http\Resources;

use App\Diet;
use App\Http\Resources\Diet as DietResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Diets extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Diet $d) {
            return (new DietResource($d));
        });

        return parent::toArray($request);
    }
}
