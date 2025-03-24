<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Model;

class Public_discount extends Model
{
    protected $fillable = ['status','title','percentage','end_at','start_at'];
}
