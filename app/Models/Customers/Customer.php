<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Model;
use App\Franchisees\Franchisee;

class Customer extends Model
{
    
    protected $fillable = ['name','contact','email','address','remark','franchisee_id'];


    public function franchisee()
    {

    	return $this->belongsTo(Franchisee::class, 'franchisee_id');

    }
}
