<?php

namespace App\Models\Roles;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   
   protected $fillable = ['name', 'description'];
   public $timestamps = false;
   
   
   public function permissions()
   {
      return $this->belongsToMany(Permission::class,'permission_role');
   }
}
