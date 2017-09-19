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
        'password', 'remember_token',
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
}
