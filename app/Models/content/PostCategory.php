<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = ['slug','name','parent_id'];




    public function parent()
    {
        return $this->hasOne(PostCategory::class, 'id', 'parent_id');
    }

}
