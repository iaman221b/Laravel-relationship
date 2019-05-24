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
                        
                        <input type="checkbox" name="blogs[{{$user->id}}][]" value="{{$blog->id}}">
                    @endforeach
                </td> 
            </tr>
                @endforeach                           
            </table>
            <button type="submit" class="btn btn-primary">Assign Task</button>
        </form>
    </div>
@endsection