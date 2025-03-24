<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','category_id','user_id','body','status','image','summery','slug'];
    
    
    
    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function category()
    {
       return $this->belongsTo(PostCategory::class,'category_id');
    }
    
    public function comments()
    {
       return $this->morphMany(Comment::class,'commentable');
    }
    
   
    
}
