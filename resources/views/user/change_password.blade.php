@extends('layouts.app')
@section('content')
    <h2>Confirm Your Password</h2>
    <form method="POST" action="/user/update/password">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Confirm Your Password</label>
            <input type="password" name ='password' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
            <small id="emailHelp" class="form-text text-muted">Confirm Your Password</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Enter New Password</label>
            <input type="password" name ='new_password' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter New Password">
            <small id="emailHelp" class="form-text text-muted">Enter New Password</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection