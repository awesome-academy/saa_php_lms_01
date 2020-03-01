<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Follow;
use App\Models\Reaction;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function role(){
    //     return $this->belongsTo('App\Models\Role');
    // }

    public function followers(){
        return $this->hasMany(Follow::class,'following_id');
    }

    public function followings(){
        return $this->hasMany(Follow::class,'follower_id');
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }
}
