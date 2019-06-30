@extends('backend.master')

@section('body')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2"></div>
            <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="x_panel">

                    @include('backend.includes.message')

                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif


                    <div class="x_title">
                        <h2><i class="fa fa-tag"></i>&nbsp; We Care Admin Panel </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br>


                        <form class="form-horizontal form-label-left" method="post" action="{{route('adminprofile')}}" enctype="multipart/form-data">
                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="category">First Name <span class="required"></span> </label>
                                <div>
                                    <input type="text" name="name"  value="{{Auth::user()->name}}" required class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="category">Email <span class="required"></span> </label>
                                <div>
                                    <input type="email" name="email"  value="{{Auth::user()->email}}" required class="form-control">
                                </div>
                            </div>










                            <div class="form-group">
                                <label>User Image</label>
                                <input type="file" name="image" class="btn btn-default">
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success pull-left">Submit</button>
                                </div>
                            </div>

                        </form>

                        <br><br>


                        <h2 class="">Change Password</h2>
                        <hr></hr>
                        <div class="row">
                            <form action="{{route('adminpassword')}}" method="post">
                                {{csrf_field()}}

                                <input type="hidden" name="id" value="{{Auth::user()->id}}">



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="oldpassword"  placeholder="enter old password" class="form-control">

                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="password" placeholder="enter new password" class="form-control">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" placeholder="confirm new password" class="form-control">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-left"> Change</button>
                                </div>

                            </form>

                            <br><br>












                        </div>
                    </div>

                </div>
                <br/>
            </div>
            <!-- /page content -->

@endsection



