<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    protected $fillable = [
         'blog_id', 'user_id',
    ];
}
