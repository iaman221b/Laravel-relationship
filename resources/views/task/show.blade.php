@extends('layouts.app')
@section('content')
@foreach ($user->tasks as $task)
            
<h3>{{$task->Roles}}</h3>
{{-- <h4>{{$comment->comment}}</h4> --}}
    @endforeach
    
@endsection