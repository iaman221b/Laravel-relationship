@extends('layouts.app')
@section('content')
    
<div class="row">
    @foreach ($posts as $post)
        <div class = "col-md-4 text-center">
            <div class="card" style="width: 18rem;">
                <img src="https://spiderimg.amarujala.com/assets/images/2019/05/28/750x506/sunny-leone_1559023138.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{$post->name}}</h5>
                <p class="card-text">{{$post->derscription}}</p>
                {{-- <p> {{$event->price}}</p> --}}
                @if(!$post['isliked'])
                    <form method="GET" action="/store/like/{{$post->id}}">
                        <button type="submit" class="btn btn-primary">Like</button>
                @endif      
                @if($post['isliked'])
                    <form method="GET" action="/store/like/{{$post->id}}">
                        <button type="submit" class="btn btn-danger">Dislike</button>
                @endif          
                    </form>
                    <div>
                        {{$post->likes_count}}
                    </div>
                 

                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection