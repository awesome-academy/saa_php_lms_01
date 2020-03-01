<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\RolePermission;
use App\Models\Permission;
class Role extends Model
{
    //

    protected $fillable = [
        'name'
    ];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function rolePermission(){
        return $this->hasMany(RolePermission::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
}
