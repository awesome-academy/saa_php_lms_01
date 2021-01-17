<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RolePermission;
use App\Models\Role;
class Permission extends Model
{
    //
    public function rolePermission(){
        return $this->hasMany(RolePermission::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
