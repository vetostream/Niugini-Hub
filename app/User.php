<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const ADMIN_TYPE = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'date_of_birth', 'gender', 'phone_number', 'address'
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
     * Get the cart associated with the user.
     */
    public function cart()
    {
        return $this->hasOne('App\Cart');
    }

    /**
     * Get the orders associated with the user.
     */
    public function orders()
    {
        return $this->hasMany('App\Orders');
    }

    public function isAdmin() {
        return $this->is_admin === self::ADMIN_TYPE;
    }

}
