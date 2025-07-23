<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Models\Roles\Permission;
use App\Models\Roles\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
   
   
   public function index()
   {
   
      $roles = Role::with('permissions')->get();
      
      return respons('list a roles',$roles);
   
   }
   
   public function store(Request $request)
   {
      
     $input = $request->all();
      $role = Role::create($input);
      $role->permissions()->sync($input['permissions']);
      return respons('created role successfully');
   }
   
   public function permissions()
   {
      $permissions = Permission::all();
      
      return respons('list a permissions',$permissions);
   }
   
}
