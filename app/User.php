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
    public $fillable = [
        'first_name','last_name','email','password','mobile_number','uploadFile','roll'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
