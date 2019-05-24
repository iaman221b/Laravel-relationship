<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;  

class FriendsController extends Controller
{
    public function index(Request $Request){
    $users = User::where('id' ,'!=', auth()->id())->get();
    $admin = User::where('id' ,'=', auth()->id())->first();
    // return $admin;
    return view('friends.index' , compact('users' , 'admin'));
    }

    public function store(Request $request){
       $requestlists = $request->friends;
       return $requestlists; 
    //    $inserDatas = []; 
    return view('friends.show' , compact('requestlists'));
       
       foreach ($requestlist as $key => $userIds){
            foreach($userIds as $userId){
                $inserDatas [] = [
                    'user_id'       => $userId,
                    'friends_id'    => $fuck,
                    'accepted'      => 0,
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            }
       }

       DB::table('friends')->insert($requestlist);
       return redirect('/home');
    }
    }
   
