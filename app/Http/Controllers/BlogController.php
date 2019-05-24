<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use App\User;
use App\Assign;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthManager;
class BlogController extends Controller
{
    public function _construct(){
         $this->middleware('auth'); 
    }
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blog.index' , compact('blogs'));
    }

    public function create()
    {
        
        $blog = Blog::all();
        return view('blog.create');
    }
   
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'user_id' => ['required', 'min:3' , 'max:255'] ,
            'title' => ['required', 'min:3' , 'max:255'] ,
            'description' => ['required', 'min:3' , 'max:255'] 
        ]);
        $blog = Blog::create($attributes);
        return redirect("/home");   
    }
   
    public function show($id , Request $request)
    {
        $blog = Blog::where('id', $id)->with('comments.user')->first();
        $check = false ;
        if (Auth::check()) {
            $role_data = DB::table('assign')
            ->where('user_id' , auth()->id())->where('blog_id' , $blog->id)->count();
            if($role_data > 0)
            {
                $check = true ;
            }
        }
        return view('blog.show' , compact('blog' , 'check') );
    }

    public function edit($id , Request $request){ 
                       
        $blog = Blog::where('id', $id)->with('comments.user')->first();
        $role_data = DB::table('assign')
                        ->where('user_id' , auth()->id())
                        ->where('blog_id' , $blog->id)
                        ->count();   

        if($this->authorize('update', $blog)){
            $blog = Blog::find($id);
            return view('blog.edit' , compact('blog'));
        }else{
            return redirect("home")->with('error','We are Anonymous. We are Legion. We do not forgive. We do not forget. Expect us.');  
        }
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->update(request([  'title' , 'description']));
        return redirect("/home");
    }

    public function comment($id){
        $blog = Blog::find($id);
        $attributes = request()->validate([
            'comment' => ['required', 'min:3' , 'max:255'] ,
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['blog_id'] = $blog->id;
        $comment = Comment::create($attributes);
        return redirect("/home");
    }

    public function destroy($id)
    {
        
    }
   
}
