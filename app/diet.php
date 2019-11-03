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

    //TODO: Check if the inverse of a many-to-many relationship needs to be defined.
    /**
     * The users that have selected this diet.
     */
    public function users()
    {
        return $this->belongsToMany('App\Diet', 'diet_user',
                                    'diet_id', 'user_id');
    }
}
