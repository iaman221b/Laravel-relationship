<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use DB;
use App\RoleUser;

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
        $users =  User::with('roles')->get();
        // return $users; 
    //    $users =  User::get();
       $roles = Role::get();
    //    return $users ;
    //    $role_user = RoleUser::get();
  
       return view('Role.index' , compact('users' , 'roles'));
      
    }

    public function store(Request $request){ 
        $rolesData = $request->roles;
        // return $rolesData;
        $inserDatas = [];
        foreach ($rolesData as $userId => $roles) {
            foreach ($roles as $key => $role) {
                $role_data = DB::table('role_user')
                ->where('user_id' , $userId)->where('role_id' , $role)->count();
                if (!$role_data) {
                    $inserDatas [] = [
                        'user_id'    => $userId,
                        'role_id'    => $role,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
            }
        }

        if (count($inserDatas) != 0 ) {
            DB::table('role_user')->insert($inserDatas);
        }
       
        return back();
    }

}


