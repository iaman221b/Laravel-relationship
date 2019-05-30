<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function blog(){
        return $this->hasMany('App\Blog', 'user_id');
      
    }

    public function profile(){
        return $this->hasOne('App\Profile' , 'user_id');
    }

    public function tasks(){
        return $this->hasMany('App\Task', 'user_id');
    }    

    public function avtar(){
        return $this->hasOne('App\Avtar' , 'user_id');
    }

    public function roles()
    {
      
        return $this->belongsToMany('App\Role', 'role_user');
    }
    
    public function blogs(){
        return $this->belongsToMany('App\Blog' , 'assign');
    }

    public function carts(){
        return $this->hasMany('App\Cart', 'user_id');
    }

    public function friends()
    {
        return $this->belongsToMany('App\User','user_friend');
    }
      
}
