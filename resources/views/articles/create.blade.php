@extends('layouts.app')
  @section('content')

    
        <form method="POST" action="/article/store">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Article Name</label>
            <input type="text" name ='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Article Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" name='description' class="form-control" id="exampleInputPassword1" placeholder="Description">
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
    


  @endsection
