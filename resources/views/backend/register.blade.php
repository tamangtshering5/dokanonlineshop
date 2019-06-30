<!DOCTYPE html>
<html lang="en">
<head>
    <title>School</title>
    <!-- Bootstrap -->
    <link href="{{URL::to('backend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::to('backend/css/custom.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::to('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
</head>

<body class="login" style="background-color:#F7F7F7;">
<div >
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="{{route('admin-register')}}">
                    <h1>Admin Registration Form</h1>

                    @if(count($errors)>0)
                        @foreach($errors->all() as $error )
                            <p class=" alert-success">{{$error}}</p>

                        @endforeach
                    @endif




                    @if(session('success'))
                        <p class="alert alert-success">{{session('success')}}</p>

                    @endif


                    {{csrf_field()}}

                    <input type="text" class="form-control" required name="name" placeholder="Enter Name">



                    <input type="text" class="form-control" required name="email" value="{{old('email')}}" placeholder="Email">

                    <input type="password" class="form-control" required name="password" placeholder="Password">

                    <input type="password" class="form-control" required name="password_confirmation" placeholder="confirm password">




                    <br>
                    <input type="checkbox" name="remember" class="pull-left">
                    <label for="" class="pull-left">&nbsp;&nbsp; Remember Me</label>
                    <button type="submit" class="btn btn-primary pull-right">Register</button>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><i class="fa fa-magic"></i>&nbsp;School</h1>
                            <p> </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
</div>
</body>
</html>
