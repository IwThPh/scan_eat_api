<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'barcode' => $this->barcode,
            'name' => $this->name,
            'weight_g' => $this->weight_g,
            'energy_100g' => $this->energy_100g,
            'carbohydrate_100g' => $this->carbohydrate_100g,
            'protein_100g' => $this->protein_100g,
            'fat_100g' => $this->fat_100g,
            'fiber_100g' => $this->fiber_100g,
            'salt_100g' => $this->salt_100g,
            'sugar_100g' => $this->sugar_100g,
            'saturated_100g' => $this->saturated_100g,
            'sodium_100g' => $this->sodium_100g,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
