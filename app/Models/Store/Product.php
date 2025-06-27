<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','weight','width','height','length', 'introduction', 'price', 'image', 'category_id','brand_id','status'];
    
    
    
    public function categories()
    {
       return $this->hasOne(ProductCategory::class);
    }
    public function brands()
    {
       return $this->hasOne(Brand::class);
    }
}
