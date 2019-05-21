<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment' , 'blog_id');
    }
}

