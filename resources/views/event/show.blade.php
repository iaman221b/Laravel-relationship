@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/coupon.css')}}" rel="stylesheet" type="text/css" />
    <div class="row">
        <div class = "col-md-6">
            <div class="row" >
                <div class="col-md-12">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Registered for the event</div>
                        <div class="card-body">
                            <h5 class="card-title">{{$event->name}}</h5>
                            <p class="card-text">{{$event->name}}</p>         
                        </div> 
                    </div> 
                </div>
            </div>
            
            <div class="row" >
                <div class="col-md-12">
                    <div class="coupon">
                        <div class="container">
                            <h3>Company Logo</h3>
                        </div>
                        <img src="https://headrushtech.com/blogs/wp-content/uploads/2017/11/ZipLine-760x420-740x409.jpg" alt="Avatar" style="width:100%;"/>
                        <div class="container" style="background-color:white">
                            <h2><b>20% OFF YOUR PURCHASE</b></h2> 
                            <p>Lorem ipsum..</p>
                        </div>
                        <div class="container">
                            <p>Use Promo Code: <span class="promo">BOH232</span></p>
                            <p class="expire">Expires: Jan 03, 2021</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "col-md-6">
            <form method="POST" action="/event/cart/{{$event->id}}">
                {{ csrf_field() }}
                    
                    @if(Auth::check())
                        @if($event['isShowBuyButton'])
                        <br>
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Book Now</button>
                        @endif
                    @endif

                    
                    @if(!Auth::check())
                        <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputPassword1">Coupon</label>
                                <input type="text" name="coupon" class="form-control" id="exampleInputPassword1" placeholder="If you don't have then ignore">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <h3>or</h3>
                        <h2><a href="/redirect/{{$event->id}}">Login</a></h2>
                    @endif


        </div>
    </div>           
        @if ($errors->any())
        <div class = "notification is-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            </form>
            
            @if(!$event['isShowBuyButton'])
            <br>
            <br>
            <br>
            <br>
            <form method="POST" action="/event/delete/{{$event->id}}">
                {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Cancel TRIP</button>
            </form>
            @endif
        </div>
    </div>


     

    
@endsection

