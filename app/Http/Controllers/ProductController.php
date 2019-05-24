<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    public function index(){
       $products = Product::with('category')->get();  

    //    $products = Product::get(); 
      //  return $products;     
       $categories = Category::with('products')->get();
      //  return $categories; 
     
       return view('product.index' , compact('products' , 'categories'));
    }
}
