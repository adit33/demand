<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='role';
    protected $primaryKey='id';
    protected $fillable=['nama_role'];
    public $timestamps=false;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function addPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('nama_permission', $permission)->first();
        }
 
        return $this->permissions()->attach($permission);
    }

}
