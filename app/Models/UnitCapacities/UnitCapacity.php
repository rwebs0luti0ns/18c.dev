<?php

namespace App\Models\UnitCapacities;

use App\Models\Items\Item;
use Illuminate\Database\Eloquent\Model;

class UnitCapacity extends Model
{
    protected $fillable = [
        'name'
    ];

    public function items()
    {
    	return $this->hasMany(Item::class, 'unit_capacity_id');
    }

}
