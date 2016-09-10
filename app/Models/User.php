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
        return $this->belongsToMany(Role::class);
    }
 
    public function hasRole($name)
    {
        foreach($this->roles as $role) {
            if ($role->name == $name) {
                return true;
            }
        }
 
        return false;
    }
 
    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }
 
        return $this->roles()->attach($role);
    }
 
    public function revokeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }
 
        return $this->roles()->detach($role);
    }
}