<?php

namespace App\Models\Brands;

use App\Models\Items\Item;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name'
    ];

    public function items()
    {
    	return $this->hasMany(Item::class, 'brand_id');
    }

}
