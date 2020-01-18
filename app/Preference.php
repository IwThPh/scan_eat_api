<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'energy_max', 'carbohydrate_max', 'protein_max',
        'fat_max', 'fiber_max', 'salt_max', 'sugar_max',
        'saturated_max', 'sodium_max'
    ];

    /**
     * Get the user of these preferences.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
