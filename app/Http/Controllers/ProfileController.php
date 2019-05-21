<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avtar;
use App\User;

class ProfileController extends Controller
{
    public function show(){
        // $avtar = Avtar::where('id' , auth()->id())->with(['profile'=>function ($query){
        //     $query->where('Designation' , CTO);
        // }])->with(['user'=>function ($query){
        //     $query->where('name' , george);
        // }])->first();
        // $user = User::where('id' , auth()->id())->with(['profile'=>function ($query){
        //     $query->where('Designation' , 'CTO');
        // }])->with(['avtar'=>function ($query){
        //     $query->where('user_id' , 'id');
        // }])->first();
        // dd('hello');

        $user = User::where('id' , auth()->id())->with('profile.avtar')->first();
        // return $user;
        return view('profile.show' , compact('user'));
        // $users = App\User::with(['posts' => function ($query) {
        //     $query->where('title', 'like', '%first%');
        // }])->get();

        
        // $tasks = Task::where('isCompleted' , 1)->where('user_id' , auth()->id())->with('user')->get();
        // $user1 = auth4::table('tasks')->where('isCompleted', '1')->first();
        // return $user;

       
        // return $user;
        // return view('task.show' , compact('user') );
       
    }


}
