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

    /**
     * The allergens this product contains.
     */
    public function allergens()
    {
        return $this->belongsToMany('App\Allergen', 'allergen_product',
                                    'product_id', 'allergen_id');
    }

    /**
     * The diets the product is compatible.
     */
    public function diets()
    {
        return $this->belongsToMany('App\Diet', 'diet_product',
                                    'product_id', 'diet_id');
    }

    /**
     * Defines path to find Product.
     */
    public function path()
    {
        return "/product/".$this->barcode;
    }
}
