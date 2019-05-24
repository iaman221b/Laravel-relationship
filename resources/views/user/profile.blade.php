@extends('layouts.app')
@section('content')


<form method="POST" action="/user/create/profile">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputPassword1">Designation</label>
    <input type="text" name='Designation' class="form-control" id="exampleInputPassword1" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name='Address' class="form-control" id="exampleInputPassword1" placeholder="Description">
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