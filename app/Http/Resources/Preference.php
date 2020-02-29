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
            'fibre_max' => $this->fibre_max,
            'salt_max' => $this->salt_max,
            'sugar_max' => $this->sugar_max,
            'saturated_max' => $this->saturated_max,
            'sodium_max' => $this->sodium_max,
            'carbohydrate_1' => $this->carbohydrate_1,
            'carbohydrate_2' => $this->carbohydrate_2,
            'protein_1' => $this->protein_1,
            'protein_2' => $this->protein_2,
            'fat_1' => $this->fat_1,
            'fat_2' => $this->fat_2,
            'fibre_1' => $this->fibre_1,
            'fibre_2' => $this->fibre_2,
            'salt_1' => $this->salt_1,
            'salt_2' => $this->salt_2,
            'sugar_1' => $this->sugar_1,
            'sugar_2' => $this->sugar_2,
            'saturated_1' => $this->saturated_1,
            'saturated_2' => $this->saturated_2,
            'sodium_1' => $this->sodium_1,
            'sodium_2' => $this->sodium_2,
        ];
    }
}
