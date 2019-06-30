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
                        <h2 style="width:250px;"><i class="fa fa-tag"></i>&nbsp; Advertisement-Edit </h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>

                    </div>
                    <div class="col col-xs-6 text-left">
                        <a href="{{route('advertisement')}}" class="btn btn-sm btn-primary btn-create"><i class="fa fa-reply"></i>Back</a>

                    </div>

                    <div class="x_content">

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">

                                <hr></hr>

                                <form class="form-horizontal form-label-left" method="post" action="{{route('advertedit_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="jumbotron form-group col-md-6 col-sm-6">

                                            <center>
                                                <img src="{{URL::to('/backend/images/advertisement/'.$data->image)}}" class="img-circle" style="height:220px;width:250px;">
                                            </center>

                                        </div><br><br><br><br>

                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Image</label>
                                            <input type="file" name="image" class="btn btn-default" style="width:380px;">
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                        <label for="category">URL <span class="required" style="color:red;">*</span> </label>
                                        <div>
                                            <input type="text" name="url" value="{{$data->url}}" required  class="form-control" >
                                        </div>
                                    </div>
                                        <br><br>
                                    </div><br>

                                    <div class="form-group">
                                        <div>
                                            <center>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </center>
                                        </div>
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