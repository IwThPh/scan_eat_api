<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Allergen extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = auth()->user();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'selected' => $user->allergens->contains($this->id),
        ];
    }
}
