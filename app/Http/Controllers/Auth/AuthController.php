<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ImageService;
use App\Services\ImageTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
   
   public function register(Request $request,ImageTools $imageTools)
   {
      $input = $request->all();
      
      $request->validate([
         'email' => 'unique:users,email',
      ]);
      
      $path = $imageTools->uploadImage($input['image'],'users');
      $input['image'] = $path;
      $input['password'] = Hash::make($input['password']);
      
      $user =  User::create($input);
      
      return respons('registered successfully',[
         'user' => $user
      ]);
      
   }
   
   public function login(Request $request)
   {
      
      $input = $request->all();
      $user = User::where('email',$input['email'])->first();
      
      if ($user) {
         
         if (!Hash::check($input['password'],$user->password))
         {
            
            return respons('invalid password','رمز عبور اشتباه است',422);
         }
         else
         {
            $token = $user->createToken('authToken');
            return respons('با موفقیت وارد شدید',
            [
               'token' => $token->plainTextToken,
               'user' => $user
            ]);
         }
      }
      return respons('user not found','ایمیل شما اشتباه است',422);
      
   }
   
   public function logout(Request $request)
   {
      $request->user()->tokens()->delete();
      return respons('logged out successfully');
   }
   public function getMe(Request $request)
   {
      $user = $request->user();
      return respons('user information',[
         'image' => asset($user->image),
         'name' => $user->name,
         'email' => $user->email,
         'created_at' => $user->created_at,
      ]);
   }
}
