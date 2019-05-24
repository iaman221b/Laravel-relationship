@extends('layouts.app')
@section('content')

    @foreach ($categories as $category)
        <br><b> {{$category->category}} </b>
    
        @foreach ($category->products as $product)
            <br>
            {{$product->product_name}}
        @endforeach
    @endforeach
@endsection