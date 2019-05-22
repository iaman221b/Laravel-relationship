<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;
use DB;
class AssignController extends Controller
{
    public function index(){
        $users =  User::with('blogs')->get();
        $blogs =  Blog::get();
        return view('assign.index' , compact('users' , 'blogs'));
    }
    public function store(Request $request){
        // dd($request->all());
        $storedata = $request->blogs;
        // return $storedata;
        $inserDatas = [];
        foreach ($storedata as $userId => $blogs) {
            foreach ($blogs as $key => $blog) {
                $role_data = DB::table('assign')
                ->where('user_id' , $userId)->where('blog_id' , $blog)->count();
                if (!$role_data) {
                    $inserDatas [] = [
                        'user_id'    => $userId,
                        'blog_id'    => $blog,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
            }
        }

        if (count($inserDatas) != 0 ) {
            DB::table('assign')->insert($inserDatas);
        }
       
        return back();
//   dd($storedata);
    
          
    }

}

// @foreach ($variable as $key => $value) {
//     # code...
// }