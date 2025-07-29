<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResourse;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
   
      public function index()
      {
         $users = User::with('roles')->get();
         return respons('list of users',UsersResourse::collection($users));
         
      }
      
      public function roles_store(Request $request,User $user)
      {
         
         $user->roles()->sync($request->role);
         return respons('new role added');
         
      }
   
   
   
}
