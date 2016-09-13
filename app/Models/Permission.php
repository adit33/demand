<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $table='permission';
	protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['nama_permission'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
 
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
 
}
