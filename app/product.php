<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barcode', 'name', 'weight_g',
        'energy_100g', 'carbohydrate_100g', 'protein_100g',
        'fat_100g', 'fiber_100g', 'salt_100g', 'sugar_100g',
        'saturated_100g', 'sodium_100g'
    ];


    /**
     * The users that have scanned this product
     */
    public function scanned()
    {
        return $this->belongsToMany('App\Product', 'product_user',
                                    'product_id', 'user_id')
                    ->withPivot('saved')->withTimestamps();
    }
}
