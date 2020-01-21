<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Preference extends JsonResource
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
            'user_id' => $this->user_id,
            'energy_max' => $this->energy_max,
            'carbohydrate_max' => $this->carbohydrate_max,
            'protein_max' => $this->protein_max,
            'fat_max' => $this->fat_max,
            'fiber_max' => $this->fiber_max,
            'salt_max' => $this->salt_max,
            'sugar_max' => $this->sugar_max,
            'saturated_max' => $this->saturated_max,
            'sodium_max' => $this->sodium_max,
        ];
    }
}
