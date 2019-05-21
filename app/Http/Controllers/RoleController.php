<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;


use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        // $roleIds = [1,4];
        // $user = User::find(1);
        // $user->roles()->sync($roleIds);
        // // $user->roles()->detach(1);
        // return view('Role.index' , compact('user'));
        // // dd($user->roles);
        // $users =  User::with('roles')->get();
       $users =  User::get();
       $roles = Role::get();
       
       return view('Role.index' , compact('users' , 'roles'));
      
    }

    public function store(Request $request){
        // dd("Hello");
        dd($request->all());
        
    }

}
