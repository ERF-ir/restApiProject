<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['image', 'status','position','name'];
}
