@extends('layouts.app')
@section('content')
    @foreach ($blogs as $blog)
        <ul>   
            <li> 
                <h2>  
                    <a href="{{route('show',['id'=>$blog->id])}}">

                        {{$blog->title}}
                    </a>  
                </h2>    
            </li> 
        </ul>
    @endforeach  
@endsection
@section('title')
    Data for Particular Element
@endsection


