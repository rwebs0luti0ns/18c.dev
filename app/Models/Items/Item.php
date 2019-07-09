<?php

namespace App\Models\Items;

use App\Models\Brands\Brand;
use App\Models\Categories\Category;
use App\Models\Products\Product;
use App\Models\UnitCapacities\UnitCapacity;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_code', 'srp', 'brand_id', 'product_id', 'category_id', 'unit_capacity_id', 'active'
    ];

    public function brand()
    {
    	return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id');
    }

    public function unit_capacity()
    {
    	return $this->belongsTo(UnitCapacity::class, 'unit_capacity_id');
    }

}
