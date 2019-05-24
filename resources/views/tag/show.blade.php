@extends('layouts.app')
    @section('content')
        @foreach ($products as $product)
            <br>
            <b>{{$product->product_name}}</b>
            @foreach ($product->tags as $tag)
                <br>
                {{$tag->tags}}
            @endforeach
        @endforeach
        <h1>I am Working</h1>
    @endsection