@extends('layouts.app')
@section('content')
    <div class = "container">
        <form method="POST" action="/event/store">
            {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Event Name</label>
            <input type="text" name ='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Event Name">
            <small id="emailHelp" class="form-text text-muted">Enter the event details</small>
        </div>
        <div class="form-group">
            <label for="comment">Description</label>
            <textarea  name="description" class="form-control" rows="5" id="comment"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" name='price' class="form-control" id="exampleInputPassword1" placeholder="Price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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
    </div>
@endsection    