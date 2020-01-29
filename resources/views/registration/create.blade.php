<html>

<head>
    <title>Registration </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        
        #image_preview {
        
        }
        #image_preview img {
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">My Project</a>
        </nav>
        @if(!Auth::check())
        <form name="register_form" enctype="multipart/form-data" method="post" action="{{route('user.store')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="first_name"><b>Firstname</b></label>
                <input type="text" name="first_name" class="form-control" placeholder="firstname">
            </div>
            
            <div class="form-group">
                <label for="last_name"><b>Lastname</b></label>
                <input type="text" name="last_name" class="form-control" placeholder="lastname">
            </div>
            
            <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input type="email" name="email" class="form-control" placeholder="email">
            </div>
            
            <div class="form-group">
                <label for="mobile_number"><b>Mobile Number</b></label>
                <input type="number" name="mobile_number" class="form-control" placeholder="mobile number">
            </div>

            <div class="form-group">
                <label for="password"><b>Password</b></label>
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
            
            <div class="form-group">
                <label for="password_confirmation"><b>Confirm Password</b></label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="confirm password">
            </div>
            
            <div class="form-group">
                <label for="image"><b>Profile Image</b></label>
                <div id="image_preview"></div>
                <input type="file" id="image" name="image" class="form-control-file"/>
            </div>

            <input type="submit" name="register_submit" value="Register" class="btn btn-primary">
        </form>
        @else
            You already have an account
        @endif
    </div>
    
    <script type="text/javascript">
        $("#image").change(function() {

            $('#image_preview').html("");

            var total_file = document.getElementById("image").files.length;

            for (var i = 0; i < total_file; i++){
                $('#image_preview').append("<img class='img img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'>");
            }
        });

        // $('form').ajaxForm(function(){
        //     alert("Uploaded SuccessFully");
        // });
    </script>
</body>
</html>