<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['image', 'status','position','name'];
}
