<?php

namespace App\Models\Roles;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
   protected $fillable = ['user_id', 'role_id'];
   
}
