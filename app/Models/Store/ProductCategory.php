<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['description','slug','parent_id','image','name'];
    
    
}
