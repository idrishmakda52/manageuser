<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home|User Manager</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('home')}}">My Project</a>
        <ul class="navbar-nav mr-auto"
            @if(!Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.create')}}">Registration </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('login.show')}}">Login </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login.logout')}}">Logout </a>
            </li>
            @endif
        </ul>
        
        @if(Auth::check()  && Auth::user()->role)
        <span class="text-light">superuser</span>
        @endif
    </nav>

    @if(Auth::check())
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="{{url('image/'.Auth::user()->uploadFile)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="card-text">
                        First Name:
                        <span class="text-primary">{{Auth::user()->first_name}}</span><br>
                        Last Name:<span class="text-primary">{{Auth::user()->last_name}}</span><br>
                        Email:<span class="text-primary">{{Auth::user()->email}}</span><br>
                        Mobile Number:<span class="text-primary">{{Auth::user()->mobile_number}}</span><br>
                        Created Date:<span class="text-primary">{{Auth::user()->created_at}}</span><br>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('user.edit',Auth::user()->id)}}">Update</a>
                </div>
            </div>
        </div>
    <div>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <td>Name</td>
                        <td>Last name</td>
                        <td>Email</td>
                        <td>Mobile number</td>
                        @if(Auth::user()->role)
                        <td>Created At</td>
                        <td>Updated At</td>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr>
                        <td>{{$value['first_name']}}</td>
                        <td>{{$value['last_name']}}</td>
                        <td>{{$value['email']}}</td>
                        <td>{{$value['mobile_number']}}</td>
                        @if(Auth::user()->role)
                        <td>{{$value['created_at']}}</td>
                        <td>{{$value['updated_at']}}</td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @endif
  </div>
</body>

</html>