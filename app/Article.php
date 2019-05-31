<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name', 'description', 'price'
   ];


   public function buys(){
    return $this->hasMany('App\Buy', 'article_id');
    }


}


