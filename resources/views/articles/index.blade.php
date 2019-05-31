@extends('layouts.app')
@section('content')

    <div class="row">
        
        @foreach ($articles as $article)
            <div class = "col-md-4 text-center">
                <div class="card" style="width: 18rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRv1Rt0WWRe3ds-ieolWetzHMeKpHM-xU-mZJmX8raTnsBg8mm" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$article['name']}}</h5>
                    <p class="card-text">{{$article->description}}</p>
                    <p> {{$article->price}}</p>
                    @if($article['isShowBuyButton'])
                        <a href="/article/book/{{$article->id}}">Buy Now</a>
                    @endif
                    @if(!$article['isShowBuyButton'])
                    <a href="/article/book/{{$article->id}}">View</a>
                    @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


