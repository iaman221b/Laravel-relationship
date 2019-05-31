<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Buy;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
   public function index(){
    // $articles = Article::latest()->get(); 
    $articles =   Article::with('buys')->get();
    // return $articles;
    $islogin = false;
    if (Auth::check()){
        $islogin = true;
    }
    $articles = $articles->map(function ($article, $index) {       
        $isShowBuyButton = true;
        if (Auth::check()) {
            $buy = $article->buys->where('user_id', auth()->id())->first();
            if ($buy) {
                $isShowBuyButton = false;
            }
        }
        $article['isShowBuyButton'] = $isShowBuyButton;

        return $article; 
    });
    // $articles = collect( $articles); 
    // return $articles;
       return view('articles.index' , compact('articles' , 'islogin'));
   }

   public function create(){
       if(auth()->id()==12){
            return view('articles.create');
       } 
       else {
        return redirect("/article");
       }
   }

//    public function create(){
//        return view('article.create');
//    }

   public function store(){
     
    $attributes = request()->validate([
        'name' => ['required', 'min:3' , 'max:255'] ,
        'description' => ['required', 'min:3' , 'max:255'] ,
        'price' => ['required'] , 
    ]);
   
     Article::create($attributes);
    return redirect("/article");
   }

   public function show(Article $article) 
   {
    $article->load('buys');
    $isShowBuyButton = true;
    
    if (Auth::check()) {
        $buy = $article->buys->where('user_id', auth()->id())->first();
        if ($buy) {
            $isShowBuyButton = false;
        }
    }
    $article['isShowBuyButton'] = $isShowBuyButton;

     
    // $article = Article::where('id' , $id)->first();
    // return $article;
    return view('articles.show' , compact('article'));
   }

   public function buy($id){
       $article = Article::where('id' , $id)->first();
       
    if (Auth::check()){
        $attributes['user_id'] = auth()->id();
        $attributes['article_id'] = $id ;
    }
    
    $buy = Buy::create($attributes);
    $article_name = $article->name;

        
        
    return redirect("/article" )->with('success' ,  "Thank you registering for JCB $article_name");
    }

    public function destroy(Article $article){
        $buy = Buy::where('user_id', auth()->id())->where('article_id', $article->id)->first();
       
       if($buy)
       {
        $buy->delete();
       }
       return redirect('/article');
    }



}



// $event->load('carts');
//         $isShowBuyButton = true;
//         if (Auth::check()) {
//             $cart = $event->carts->where('user_id', auth()->id())->first();
//             if ($cart) {
//                 $isShowBuyButton = false;
//             }
//         }
//         // dd( $isShowBuyButton); 
//         $event['isShowBuyButton'] = $isShowBuyButton;
//         return view('event.show' , compact('event'));