<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $guarded = [
        
    ];

    public function articles(){
        return $this->belongsTo('App\Article' , 'article_id');
    }
}
