<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'age', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot'
    ];

    /**
     * The businesses this user owns
     */
    public function businesses()
    {
        return $this->hasMany('App\Business');
    }

    /**
     * The stores this user has access to
     */
    public function stores()
    {
        return $this->belongsToMany('App\Store');
    }

    /**
     * The offers this user has bought
     */
    public function purchases()
    {
        return $this->belongsToMany('App\Offer', 'purchases')
                    ->withPivot('purchase_date');
    }
}
