<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    // use Searchable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik', 'nama', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    protected $primaryKey='nik';
    protected $table='user';
    public $timestamps=true;

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user','user_nik','role_id');
    }
 
    public function permissions()
    {
        return $this->hasManyThrough(Permission::class, Role::class);
    }
    
    public function isSuper()
    {
       if ($this->roles->contains('name', 'super')) {
            return true;
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->isSuper()) {
            return true;
        }
        if (is_string($role)) {
            return $this->role->contains('name', $role);
        }
        return !! $this->roles->intersect($role)->count();
    }
    
    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('nama_role', $role)->first();
        }
        return $this->roles()->attach($role);
    }
    
    public function revokeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('nama_role', $role)->first();
        }
        return $this->roles()->detach($role);
    }

    public function updateRole($role){
         $role = Role::where('nama_role', $role)->pluck('id')->toArray();
        return $this->roles()->sync($role);
    }
}
