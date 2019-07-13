<?php

namespace App\Models\Auth;

use App\Models\Franchisees\Franchisee;
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
    
    public function franchisee()
    {
        return $this->belongsTo(Franchisee::class, 'franchisee_id');
    }
}
