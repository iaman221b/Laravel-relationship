@extends('layouts.app')
@section('content')
<link href="{{ asset('css/roleindex')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">




<div class="container">
    <form method="POST" action="/assign/store">
        {{ csrf_field() }}
<table class="table table-striped">
    <tr>
      <th>Name</th>
      <th>Blog Access</th> 
      
    </tr>
    <script>
    var x = true;
    </script>

    <tr>
       
            @foreach ($users as $user)
            <td> 
                {{$user->name}}
               
            </td>

            @foreach ($blogs as $blog)
            <td>
               
                    {{$blog->id}}    
                {{-- @php
                        $isChecked = false;
                        foreach ($user->roles as $key => $user_role) {
                            if ($user_role->pivot->role_id == $role->id) {
                                $isChecked = true;
                            }
                        }
                    @endphp --}}
                    {{--
                    <input type="checkbox" name="roles[{{$user->id}}][]" value="{{$role->id}}"> {{$role->role}}<br>  --}}
                    <input type="checkbox" name="blogs[{{$user->id}}][]" value="{{$blog->id}}">
                @endforeach
            </td> 
                
    </tr>
    @endforeach   
        
           
  </table>
  <button type="submit" class="btn btn-primary">Assign Task</button>

  {{-- @foreach ($users->roles as $role)
  @foreach ($roles->pivot as $pivo)
      {{$user_id}}
  @endforeach --}}

      
  {{-- @endforeach --}}
</form>
</div>
@endsection