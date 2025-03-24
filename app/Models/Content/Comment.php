<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $fillable = ['approved', 'user_id', 'commentable_type','commentable_id', 'body','parent_id'];
   
   public function commentable()
   {
      return $this->morphTo('commentable');
   }
   
   public function user()
   {
      return $this->belongsTo(User::class);
   }
}
