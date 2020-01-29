
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@if(!Auth::check())
<div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">My Project</a>
  </nav>
  <div class="row">
    <div class="col">
    <form name="login_form" method="post" action="{{route('logon.store')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" class="form-control" name="email" required>
      </div>
      
      <div class="form-group">
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" class="form-control" name="password" required<br>
      </div>

      <input type="submit" class="btn btn-primary" name="register_submit" value="Login"><br>
    </form>
    </div>
  </div>
</div>
    @endif
@if(Auth::check())

your account ia already created  
@endif
</body>
</html>



