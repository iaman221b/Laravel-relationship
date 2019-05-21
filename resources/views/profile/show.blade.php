@extends('layouts.app')
@section('content')
<ul>
 <li>{{$user->profile->Designation}}</li>  
   <br>
 <br>
 <li> <a href="{{$user->profile->avtar->image}}">Dynamic Image Inserted!</a></li>
 <img src="{{$user->profile->avtar->image}}">









@endsection