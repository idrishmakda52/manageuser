<html>

<head>
    <title>Update-User </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        #image_preview {}

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
        <form name="Update_user_form" enctype="multipart/form-data" method="post" action="{{route('user.update',$user->id)}} ">
            {{ method_field('PUT') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="first_name"><b>Firstname</b></label>
                <input type="text" name="first_name" class="form-control" placeholder="firstname" value="{{$user->first_name}}">
            </div>

            <div class="form-group">
                <label for="last_name"><b>Lastname</b></label>
                <input type="text" name="last_name" class="form-control" placeholder="lastname" value="{{$user->last_name}}">
            </div>


            <div class="form-group">
                <label for="email"><b>Email </b></label>
                <input type="text" name="email" class="form-control" placeholder="email" value="{{$user->email}}">
            </div>

            <div class="form-group">
                <label for="mobile number"><b>Mobile Number </b></label>
                <input type="number" name="mobile_number" class="form-control" placeholder="mobile number" value="{{$user->mobile_number}}">
            </div><br>

            <input type="file" id="image" name="image" value="{{$user->uploadFile}}" />

            <input type="submit" name="update_submit" value="update"><br>



        </form>


        <div id="image_preview" style="height:100px;width:100px;">
            <img src="{{url('image/'.$user->uploadFile)}}" style="height:100px;width:100px;" /></div>


    </div>
    <script type="text/javascript">
        $("#image").change(function() {

            $('#image_preview').html("");

            var total_file = document.getElementById("image").files.length;

            for (var i = 0; i < total_file; i++)

            {

                $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

            }

        });



        $('form').ajaxForm(function()

            {

                alert("Uploaded SuccessFully");

            });

    </script>



</body>

</html>
