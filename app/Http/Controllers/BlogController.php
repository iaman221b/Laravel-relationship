<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use App\User;
use App\Assign;
use DB;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthManager;




class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct(){
         $this->middleware('auth'); 
    }
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blog.index' , compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $blog = Blog::all();
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'user_id' => ['required', 'min:3' , 'max:255'] ,
            'title' => ['required', 'min:3' , 'max:255'] ,
            'description' => ['required', 'min:3' , 'max:255'] 
        ]);
        $blog = Blog::create($attributes);
        return redirect("/home");
        // dd("working");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , Request $request)
    {
        // $credentials = $request->only('email', 'password');
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
        // $assigns = Assign::get();
        // dd($assigns);
        // foreach ($assigns as $assign) {
        //     $role_data = DB::table('assign')
        // ->where('user_id' , $user)->where('blog_id' , $blog->id)->count();
        // }
        
        //  $check = false ;
        // if($role_data>0)
        // {
        //     $check = true;
        // }
        // dd($check);
        //  return  $blog;
        return view('blog.show' , compact('blog' , 'check') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , Request $request)
    {     $blog = Blog::where('id', $id)->with('comments.user')->first();

        $role_data = DB::table('assign')
        ->where('user_id' , auth()->id())->where('blog_id' , $blog->id)->count();
            if($role_data > 0)
            {
                $blog = Blog::find($id);
                return view('blog.edit' , compact('blog'));
            }
                else {
                   
                    // return redirect("home")->$request->session()->flash('status', 'Task was successful!');
                    
                    //  return redirect("home")->flash('status', 'Task was successful!');
                    return redirect("home")->with('error','We are Anonymous. We are Legion. We do not forgive. We do not forget. Expect us.');
                    
                    
                }
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->update(request([  'title' , 'description']));
        return redirect("/home");
        // dd("I am working");

    }

    public function comment($id){
        $blog = Blog::find($id);
        // $user = User::find($id);
        $attributes = request()->validate([
            'comment' => ['required', 'min:3' , 'max:255'] ,
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['blog_id'] = $blog->id;
        $comment = Comment::create($attributes);
        return redirect("/home");
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   
   
}
