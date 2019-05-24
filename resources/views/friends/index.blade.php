@extends('layouts.app')
@section('content')
     

    <div class = "container">
        <form method="POST" action="/friends/requested">
            <div class="container">
                    <h1>Add Friends</h1>
                    @foreach ($users as $user)
                       <input type="checkbox" value="{{$user->id}}" name="friends[{{$admin->id}}][]">{{$user->name}} <br> <br>                                                            
                    @endforeach
                    </div>   
            {{ csrf_field() }}
          <button type="submit" class="btn btn-primary">Add Friends</button>
        </form>
@endsection
   