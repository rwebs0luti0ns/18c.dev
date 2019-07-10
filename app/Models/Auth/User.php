<?php

namespace App\Models\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    protected $guard = 'franchisee';

    protected $fillable = [
        'name', 'username', 'password', 'franchisee_id', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

}
