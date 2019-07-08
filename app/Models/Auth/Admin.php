<?php

namespace App\Models\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'username', 'password', 'role', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
