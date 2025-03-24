<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Model;

class Coupon_discount extends Model
{
    protected $fillable = ['percentage','title'
       ,'status','type','user_id','coupon_code','start_at','end_at'];
}
