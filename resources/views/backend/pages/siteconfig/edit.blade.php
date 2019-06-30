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
                        <h2 style="width:250px;"><i class="fa fa-tag"></i>&nbsp; Site-Configuration </h2>
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
                            <li class="active"><a data-toggle="pill" href="#home"><h5>Logo</h5></a></li>
                            <li><a data-toggle="pill" href="#menu3"><h5>Information</h5></a></li>

                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">

                                <hr></hr>
@foreach($datas as $data)
                                <form class="form-horizontal form-label-left" method="post" action="{{route('admin-logo',['id'=>$data->id])}}" enctype="multipart/form-data">
                                    {{csrf_field()}}



                                    <div class="row">


                                        <div class="jumbotron form-group col-md-6 col-sm-6">

                                            <center>
                                                <img src="{{URL::to('frontend/image/logo/'.$data->image)}}" class="img-circle" style="height:220px;width:250px;">
                                            </center>

                                        </div><br><br><br><br>

                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Logo</label>
                                            <input type="file" name="image" class="btn btn-default" style="width:380px;">
                                        </div><br><br>



                                    </div><br>

                                    <div class="form-group">
                                        <div>
                                            <center>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </center>
                                        </div>
                                    </div>







                                </form>
                                @endforeach



                            </div>





                            <div id="menu3" class="tab-pane fade">


                                <hr></hr>

                                <form action="{{route('admin-information-update',['id'=>$info->id])}}" method="post">
                                    {{csrf_field()}}


                                    <div class="col-md-4 col-xs-12 ">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address"  placeholder="enter address" value="{{$info->address}}" class="form-control">

                                        </div>
                                    </div>



                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Phone-1</label>
                                            <input type="text" name="phone1" placeholder="enter phone1" value="{{$info->phone1}}" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Phone-2</label>
                                            <input type="text" name="phone2" placeholder="enter phone2" value="{{$info->phone2}}" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="enter email" value="{{$info->email}}" class="form-control">

                                        </div>
                                    </div>



                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Facebook_Link</label>
                                            <input type="text" name="fblink" placeholder="enter facebook link" value="{{$info->fblink}}" class="form-control">

                                        </div>
                                    </div>



                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Twitter_Link</label>
                                            <input type="text" name="twitterlink" placeholder="enter twitter link" value="{{$info->twitterlink}}" class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Insta_Link</label>
                                            <input type="text" name="instalink" placeholder="enter pinterest link" value="{{$info->instalink}}" class="form-control">

                                        </div>
                                    </div>



                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Google_Link</label>
                                            <input type="text" name="googlelink" placeholder="enter google link" value="{{$info->googlelink}}" class="form-control">

                                        </div>
                                    </div>



                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Google_Map</label>
                                            <input type="text" name="googlemap" placeholder="enter linkedln link" value="{{$info->google_map}}" class="form-control">

                                        </div>
                                    </div>

                                    <br><br>


                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success pull-right btn btn-md" style="margin-right:600px;">Submit</button>
                                    </div>


                                </form>


                            </div>








                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>















@endsection