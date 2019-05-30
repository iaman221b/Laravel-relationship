
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/header/header.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/footer/footer.css')}}" rel="stylesheet" type="text/css" />
    <title>@yield('title' , 'Default Title')</title>
  </head>
  <body>
    @include('flash-message')
    <div class="header">
      <a href="/home" class="logo">Welcome to my blog</a>
      <div class="header-right">
      <a class="active" href="/home">Home</a>
      @if (!Auth::check())
        <a href="/user/create">Sign Up</a>
        <a href="/user/login">Login</a>
        <a href="/event/show">Book Event</a>        
      @endif
      @if (Auth::check())
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form> 
      <a onclick="event.preventDefault()
      document.getElementById('logout-form').submit();">
      Logout
      <a href="/user/profile">Profile</a>  
      <a href="/event/show">Book Event</a>  
      <a href="/user/change/password">Change Password</a>                   
      </a>
      @endif
      </div>
    </div>    
    <div class="container"> @yield('content')  
    </div>
         
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
        <div class="footer">
          <p>Scoop Whoop</p>
          <p>Best blog ever made</p>
          <p>Contact information: <a href="mailto:someone@example.com">
          amant@bluelupin.com</a>.</p>
        </div>
    </body>
</html>