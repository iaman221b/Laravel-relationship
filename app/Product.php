<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function category(){
        return $this->belongsTo('App\Category' , 'product_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag' , 'product_tag',  'product_id' , 'tag_id');
    } 
}
