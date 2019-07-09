<?php

namespace App\Models\Franchisees;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

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
		$this->hasMany(User::class, 'franchisee_id');
	}
    
}
