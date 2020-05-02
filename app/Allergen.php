<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'alt'
    ];

    /**
     * The attributes to cast.
     *
     * @var array
     */
    protected $casts = [
        'alt' => 'array'
    ];

    /**
     * The users that have selected this allergen.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'allergen_user',
                                    'allergen_id', 'user_id');
    }

    /**
     * The products that containt this allergen.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'allergen_product',
                                    'allergen_id', 'product_id');
    }
}
