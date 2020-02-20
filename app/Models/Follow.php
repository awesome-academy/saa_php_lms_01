<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Follow extends Model
{
    //
    public function follower(){
        return $this->belongsTo(User::class,'follower');
    }

    public function following(){
        return $this->belongsTo(User::class,'following');
    }
}
