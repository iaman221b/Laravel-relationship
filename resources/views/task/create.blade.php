@extends('layouts.app')
@section('content')


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
<form method="POST" action="/task/store">
  {{ csrf_field() }}
<div class="form-group">
<label for="exampleInputEmail1">Roles Assigned</label>
<input type="text" name ='Roles' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Roles-Assigned">
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>
<div class="form-group">
<label for="exampleInputPassword1">isCompleted</label>
<input type="text" name='isCompleted' class="form-control" id="exampleInputPassword1" placeholder="Status">
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
