<?php

namespace App\Http\Resources;

use App\Allergen;
use App\Http\Resources\Allergen as AllergenResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Allergens extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Allergen $a) {
            return (new AllergenResource($a));
        });

        return parent::toArray($request);
    }
}
