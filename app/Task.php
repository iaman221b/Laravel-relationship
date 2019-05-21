<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        'Roles' , 'user_id' , 'isCompleted'
    ];
    public function user()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }

}
