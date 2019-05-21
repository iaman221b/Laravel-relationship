<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avtar extends Model
{
    protected $fillable = [
       'user_id'
    ];

    public function user(){
        return $this->hasOne('App\User' , 'user_id');
    }
}
