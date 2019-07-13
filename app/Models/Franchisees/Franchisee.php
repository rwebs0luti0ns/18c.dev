<?php

namespace App\Models\Franchisees;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customers\Customer;


class Franchisee extends Model
{
    protected $fillable = [
        'owner', 'id_code', 'area_code', 'company_name', 'date_started'
    ];

    public function setDateStartedAttribute($date)
    {
        $this->attributes['date_started'] = date('Y-m-d', strtotime($date));
    }

	public function users()
	{
		return $this->hasMany(User::class, 'franchisee_id');
	}

    public function customers()
    {
        return $this->hasMany(Customer::class, 'franchisee_id');
    }
    
}
