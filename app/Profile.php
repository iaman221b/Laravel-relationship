<?php

namespace App;
use App\User;
use App\Avtar;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->hasOne('App\User' , 'user_id');
    }

    public function avtar(){
        return $this->hasOne('App\Avtar' , 'user_id');
    }
}
    
