<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;


class TaskController extends Controller
{
    public function create(){
        return view('task.create');
    }

    public function store(){
        $attributes = request()->validate([
            'Roles' => ['required', 'min:3' , 'max:255'] ,
            'isCompleted' => ['required']
            
        ]);

        $attributes['user_id'] = auth()->id();

        Task::create($attributes);
            return redirect('/home');
    }

    public function show(){
        $user = User::where('id' , auth()->id())->with(['tasks'=>function ($query){
            $query->where('isCompleted' , 0);
        }])->first();
        // $users = App\User::with(['posts' => function ($query) {
        //     $query->where('title', 'like', '%first%');
        // }])->get();

        
        // $tasks = Task::where('isCompleted' , 1)->where('user_id' , auth()->id())->with('user')->get();
        // $user1 = auth4::table('tasks')->where('isCompleted', '1')->first();
        // return $user;

       
        // return $user;
        return view('task.show' , compact('user') );
       
    }
}
