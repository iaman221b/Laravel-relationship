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
        
        <form method="POST" action="/blog/edit/{{$blog->id}}">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
        
          <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name='title' class="form-control" id="exampleInputPassword1" placeholder="Title" value="{{$blog->title}}">
          </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <input type="text" name='description' class="form-control" id="exampleInputPassword1" placeholder="Description" value = "{{$blog->description}}">
          </div>
          <button type="submit" class="btn btn-primary">Update Me</button>
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