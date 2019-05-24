@extends('layouts.app')
  @section('content')

    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        @section('title')
        Enter the details Admin
        @endsection
      </head>
    
      <body>
        <form method="POST" action="/store">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">User ID</label>
            <input type="text" name ='user_id' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User-ID">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name='title' class="form-control" id="exampleInputPassword1" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" name='description' class="form-control" id="exampleInputPassword1" placeholder="Description">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
      </body>
    </html>


  @endsection
