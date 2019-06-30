@extends('backend.master')

@section('body')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2"></div>
            <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="x_panel">





                    @if(session('success'))
                        <center>
                            <div class="alert alert-success alert-dismissible" style="width:800px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{session('success')}}</strong>
                            </div>

                        </center>
                    @endif


                    @if(session('error'))
                        <center>
                            <div class="alert alert-danger alert-dismissible" style="width:800px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{session('error')}}</strong>
                            </div>

                        </center>
                    @endif

                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif


                    <div class="x_title">
                        <h2><i class="fa fa-tag"></i>&nbsp; Grafias Admin Panel </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content" style="background-color: ghostwhite;">
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
                                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                                </div>
                            </div>

                        </form>

                        <br><br>







                        <h2 class="">Change Password</h2>
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
                                    <button type="submit" class="btn btn-success pull-right"> Change</button>
                                </div>

                            </form>

                            <br><br>




                            <div class="x_content" style="background-color: ghostwhite; ">
                                <div class="x_title">
                                    <h2><i class="fa fa-users"></i> Clients Detail</h2>&nbsp;&nbsp;&nbsp;<a href="{{route('adminregister')}}"><button class="btn btn-warning">Add Users</button></a>
                                    <ul class="nav navbar-right panel_toolbox">

                                    </ul>
                                    <div class="clearfix"></div>
                                </div>


                                <table class="table table-bordered table-striped " id="products">
                                    <tr>
                                        <th width="15%">#</th>

                                        <th width="15%">Name</th>
                                        <th>Utype</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                    @foreach($nis as $data)
                                        <tbody id="productContent">
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->utype}}</td>
                                            <td><img src="{{URL::to('/backend/userimg/'.$data->image)}}" width="150px" height="140px"></td>
                                            <td>



                                                <form action="{{route('admin-profile-delete',['id'=>$data->id])}}" method="post">
                                                    {{ csrf_field() }}

                                                    <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span></button>
                                                </form>

                                            </td>
                                        </tr>
                                        </tbody>

                                    @endforeach

                                </table>
                                <center></center>












                            </div>
                        </div>

                    </div>
                    <br/>
                </div>
                <!-- /page content -->

@endsection
