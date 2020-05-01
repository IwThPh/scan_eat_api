<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The users that have selected this diet.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'diet_user',
                                    'diet_id', 'user_id');
    }

    /**
     * The products that are compatible with this diet.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'diet_product',
                                    'diet_id', 'product_id');
    }
}
