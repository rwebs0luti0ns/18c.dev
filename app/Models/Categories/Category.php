<?php

namespace App\Models\Categories;

use App\Models\Items\Item;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function items()
    {
    	return $this->hasMany(Item::class, 'category_id');
    }

}
