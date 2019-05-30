@extends('layouts.app')
@section('content')

    <div class="row">
        @foreach ($events as $event)
            <div class = "col-md-4 text-center">
                <div class="card" style="width: 18rem;">
                    <img src="https://headrushtech.com/blogs/wp-content/uploads/2017/11/ZipLine-760x420-740x409.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$event->name}}</h5>
                    <p class="card-text">{{$event->description}}</p>
                    <p> {{$event->price}}</p>
                 
                  @if( $event['isShowBuyButton'])
                    <a href="/event/book/{{$event->id}}">Buy Now</a>
                    @endif
                    @if( !$event['isShowBuyButton'])
                    <a href="/event/book/{{$event->id}}">View</a>
                    @endif  
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection