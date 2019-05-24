<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tag;
use DB;

class TagController extends Controller
{
    public function index(){
        $products = Product::with('tags')->get();
        // return $products; 
        $tags = Tag::get();
        return view('tag.index' , compact('products' , 'tags'));
    }

    public function store(Request $request){
        $tagsData = $request->tag;
        // return $tagsData; 

        $inserDatas = [];
        foreach ($tagsData as $product_id => $tags) {
            foreach ($tags as $key => $tag) {
                $inser_data = DB::table('product_tag')
                ->where('product_id' , $product_id)->where('tag_id' , $tag)->count();
                if (!$inser_data) {
                    $inserDatas [] = [
                        'product_id'    => $product_id,
                        'tag_id'    => $tag,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
            }
        }

        if (count($inserDatas) != 0 ) {
            DB::table('product_tag')->insert($inserDatas);
        }
    //    return back();
        return redirect('/tag/show');

    }

    public function show(){
        $products = Product::with('tags')->get();
        // return $products; 
        return view('tag.show' , compact('products'));
    }

    
}

