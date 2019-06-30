@extends('backend.master')

@section('body')

    <div class="right_col" role="main">

        <div style="margin-top:65px;">
            @include('backend.includes.message')
        </div>


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_title">
                        <h2 style="width:250px;"><i class="fa fa-tag"></i>&nbsp; Configuration </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">





                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#home"><h5>Profile Image</h5></a></li>
                            <li><a data-toggle="pill" href="#menu3"><h5>Change Password</h5></a></li>
                            <li><a data-toggle="pill" href="#menu2"><h5>Register Users</h5></a></li>
                            <li><a data-toggle="pill" href="#menu4"><h5>View Users</h5></a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">

                                <hr></hr>

                                <form class="form-horizontal form-label-left" method="post" action="{{route('adminprofile')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}



                                    <div class="row">


                                        <div class=" jumbotron form-group col-md-6 col-sm-6">

                                            <center>
                                            <img src="{{URL::to('backend/userimg/'.Auth::user()->image)}}" style="height:220px;width:250px;">
                                            </center>

                                        </div><br><br>




                                    <div class="form-group col-md-6 col-sm-6">
                                        <label for="category">First Name <span class="required"></span> </label>
                                        <div>
                                            <input type="text" name="name"  value="{{Auth::user()->name}}" required class="form-control">
                                        </div>
                                    </div><br><br>







                                    <div class="form-group col-md-6 col-sm-6">
                                        <label for="category">Email <span class="required"></span> </label>
                                        <div>
                                            <input type="email" name="email"  value="{{Auth::user()->email}}" required class="form-control">
                                        </div>
                                    </div><br><br>



                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>User Image</label>
                                            <input type="file" name="image" class="btn btn-default" style="width:380px;">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <center>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </center>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div id="menu2" class="tab-pane fade">

                                <hr></hr>
                                <form action="{{route('admin-register')}}" method="post">
                                        {{csrf_field()}}


                                      <div class="row">
                                        <div class="col-md-6 col-xs-12 ">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name"  placeholder="enter name" class="form-control">

                                            </div>
                                        </div>



                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="enter email" class="form-control">

                                            </div>
                                        </div>
                                      </div>


                                     <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="enter password" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="password_confirmation" placeholder="confirm new password" class="form-control">

                                            </div>
                                        </div>
                                     </div>
                                        <br><br>


                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success pull-right btn btn-md" style="margin-right:600px;">Submit</button>
                                        </div>


                                    </form>
                                </center>
                            </div>



                            <div id="menu3" class="tab-pane fade">
                                <hr></hr>

                                <form action="{{route('adminpassword')}}" method="post">
                                    {{csrf_field()}}

                                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                    <div class="col-md-4 col-xs-12 ">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" name="oldpassword"  placeholder="enter old password" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="password" placeholder="enter new password" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" placeholder="confirm new password" class="form-control">

                                        </div>
                                    </div><br><br>


                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success pull-right btn btn-md" style="margin-right:600px;">Submit</button>
                                    </div>
                                </form>
                            </div>


                            <div id="menu4" class="tab-pane fade">

                                <hr></hr>

                                <center>
                                <table class="table table-bordered table-striped " id="products" >
                                    <tr style="background-color: antiquewhite;">
                                        <th width="10%">#</th>

                                        <th width="20%">Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                    @foreach($nis as $data)
                                        <tbody id="productContent">
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            @if($data->image)
                                            <td>
                                                <center>
                                                    <img src="{{URL::to('/backend/userimg/'.$data->image)}}" width="150px" class="img-circle" height="140px">
                                                </center>
                                            </td>
                                            @else
                                                <td style="color:red;">Image yet to be selected</td>
                                                @endif
                                            <td style="width:15%;">

                                                <center>
                                                <form action="{{route('admin-profile-delete',['id'=>$data->id])}}" method="post">
                                                    {{ csrf_field() }}

                                                    <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash" title="Delete"></span></button>
                                                </form>
                                                </center>

                                            </td>
                                        </tr>
                                        </tbody>

                                    @endforeach

                                </table>
                                </center>



                            </div>





                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>















    @endsection