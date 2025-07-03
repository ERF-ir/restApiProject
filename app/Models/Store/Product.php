<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','weight','width','height','length', 'introduction', 'price', 'image', 'category_id','brand_id','status'];
    
    
    
    public function category()
    {
       return $this->hasOne(ProductCategory::class,'id','category_id');
    }
    public function brand()
    {
       return $this->hasOne(Brand::class,'id','brand_id');
    }
}
