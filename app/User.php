<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the preferences that belong to this user.
     */
    public function preference()
    {
        return $this->hasOne('App\Preference');
    }

    /**
     * The products that the user has scanned.
     */
    public function scanned()
    {
        return $this->belongsToMany('App\Product', 'product_user',
                                    'user_id', 'product_id')
                    ->withPivot('saved')->withTimestamps();
    }

    /**
     * The products that the user has saved.
     */
    public function saved()
    {
        return $this->belongsToMany('App\Product', 'product_user',
                                    'user_id', 'product_id')
                    ->wherePivot('saved', true);
    }

    /**
     * The allergies the user has.
     */
    public function allergens()
    {
        return $this->belongsToMany('App\Allergen', 'allergen_user',
                                    'user_id', 'allergen_id');
    }
}
