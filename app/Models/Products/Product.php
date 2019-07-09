<?php

namespace App\Models\Products;

use App\Models\Items\Item;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name'
    ];

    public function items()
    {
    	return $this->hasMany(Item::class, 'product_id');
    }

}
