<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Roles\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
       'image',
       
    ];

   
    
    
    function roles()
    {
       return $this->belongsToMany(Role::class);
       
    }
   
   public function getRoleNamesAttribute()
   {
      return $this->roles->pluck('name')->implode(', ');
   }
   
   
   
   public function hasPermission($permissionName)
   {
      foreach ($this->roles as $role) {
         if ($role->permissions->contains('name', $permissionName)) {
            return true;
         }
      }
      return false;
   }
   
   protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
