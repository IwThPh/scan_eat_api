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
        'energy_max',
        'carbohydrate_max',
        'carbohydrate_1',
        'carbohydrate_2',
        'protein_max',
        'protein_1',
        'protein_2',
        'fat_max',
        'fat_1',
        'fat_2',
        'fibre_max',
        'fibre_1',
        'fibre_2',
        'salt_max',
        'salt_1',
        'salt_2',
        'sugar_max',
        'sugar_1',
        'sugar_2',
        'saturated_max',
        'saturated_1',
        'saturated_2',
        'sodium_max',
        'sodium_1',
        'sodium_2',
    ];

    /**
     * Get the user of these preferences.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
