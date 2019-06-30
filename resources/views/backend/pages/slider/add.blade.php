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


                        <h2><i class="fa fa-tags"></i>Slider &nbsp;&nbsp;&nbsp;&nbsp;



                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" style="color:white">ADD</span></button></h2>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><center>Add Slider</center></h4>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{route('admin-slider-action')}}" method="post" enctype="multipart/form-data">

                                            {{csrf_field()}}
                                            <div class="form-group col-md-6" >
                                                    <label class="form-group" >Image_Title:</label>
                                                    <input type="text" class="form-control" name="title">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-group">Image:</label>
                                                    <input type="file" class="form-control" required name="image">
                                                </div>


                                            <center> <div class="form-group col-md-4" style="font-size: 14px;" >
                                                    <button type="submit" class="form-control btn btn-success" style="margin-left:200px;">Submit</button>
                                                </div>
                                            </center>


                                        </form>



                                    </div>
                                    <div class="modal-footer"  >
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>


                        </h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">


                        <div class="panel-body">
                            <div class="col-md-8">
                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                <tr>
                                    <th class="hidden-xs">Image</th>
                                    <th class="hidden-xs">Title</th>
                                    <th><em class="fa fa-cog"></em></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($slider as $data)
                                    <tr>
                                        <td><img src="{{URL::to('/frontend/image/slider/'.$data->image)}}" style="height:100px;width:200px;"> </td>
                                        @if($data->title != null)
                                        <td>{{$data->title}}</td>
                                        @else
                                            <td><text>title not given</text></td>
                                        @endif
                                        <td algn="center">
                                            <form action="{{route('admin-slider-delete',['id'=>$data->id])}}" method="post">
                                                {{csrf_field()}}
                                                <button class="btn btn-danger" title="delete"><em class="fa fa-trash"></em></button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection