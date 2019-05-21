

@extends('layouts.app')
@section('content')
    <div class="container">
    <h3>{{$blog->title}}</h3> <br>
    <p>{{$blog->description}}</p>
    
    <a href="/blog/edit/{{$blog->id}}"><button type="button" class="btn btn-primary">Update Post</button></a>
   
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
    <div>
        @if (Auth::check())
                <form method="POST" action="/comment/{{$blog->id}}">
                    {{ csrf_field() }}
            <textarea name = "comment" rows="4" cols="100"> Enter Comment</textarea>
            <br>
            <button>Submit</button>
            <form>
           
           @endif
           

       
    </div>
    <br>
    <br>
    <br>
    <br>
    <div>
        @foreach ($blog->comments as $comment)
            
        <h3>{{$comment->user->name}}</h3>
        <h4>{{$comment->comment}}</h4>
            @endforeach
    </div>
   
@endsection




@section('title')
{{$blog->title}}
@endsection
