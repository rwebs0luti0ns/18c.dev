<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = [
        'name', 'contact_no', 'email', 'address', 'remarks', 'franchisee_id'
    ];


}
