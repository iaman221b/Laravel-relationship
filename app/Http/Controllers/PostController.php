<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::withCount('likes')->get();
        // return $posts; 
        $posts = $posts->map(function ($post, $index) {
            $isliked = false;
            if (Auth::check()) {
                $found = $post->likes->where('user_id', auth()->id())->first();
                if ($found) {
                    $isliked = true;
                }
            }
            $post['isliked'] = $isliked; 

            return $post; 
        });
        
        $posts = collect( $posts);
        // return $posts;
        return view('post.index' , compact('posts'));
    }

    public function store($id){

        $post = Post::where('id', $id)->with('likes')->first();
        $found = $post->likes->where('user_id', auth()->id())->first();
        if($found){
            DB::table('likes')->where('user_id', auth()->id())->where('post_id' , $id)->delete();
        }
        else{
            $attributes['user_id'] = auth()->id();
            $attributes['post_id'] = $id ;
            $attributes['count'] = 1 ;
            Like::create($attributes);
        }

        return redirect('/post');

        // foreach($post->likes as $key=$like){
        //     if($post->like->count = 
        // }

        // if($post->likes)
        
        // $likes = Like::where('post_id' , $id )->get();
        // // return $likes; 
        // if($likes!= null){
        //     dd("working inside");
        //     foreach($likes as $like){
        //         DB::table('likes')  
        //         ->update(['count' => $like->count + 1]);
        //     }
        // }   
        // else{
        //     DB::table('likes')->insert(
        //         ['post_id' => $id , 'count' => 1]
        //     );
        // }
        // dd("working");
   }
}
