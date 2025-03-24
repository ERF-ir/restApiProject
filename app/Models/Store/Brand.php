<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   protected $table = '_brands';
    protected $fillable = ['slug', 'name', 'original_name','status','logo'];
}
