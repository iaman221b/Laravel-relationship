<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [
    ];
    public function events(){
        return $this->belongsTo('App\Event' , 'event_id');
    }

    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }
}
