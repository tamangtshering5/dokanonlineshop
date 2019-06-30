@extends('backend.master')
@section('body')


    <div class="right_col" role="main">

        <div style="margin-top:65px;">
            @include('backend.includes.message')
        </div>


        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="x_panel">

                    <div class="x_title">
                        <h2><i class="fa fa-tag"></i>&nbsp; Add Category </h2>
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
                        <form class="form-horizontal form-label-left" method="post"
                              action="{{route('admin-product-menu-action')}}" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="category">Menu <span class="required">*</span> </label>
                                <div>


                                    <input type="text" id="name" name="menu" required  class="form-control">
                                </div>
                            </div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function(){

                                    $("input#name").keyup(function(e){
                                        var val = $(this).val();
                                        val = val.replace(/[^\w]+/g, "-");
                                        $("input#slug").val(val);
                                    });

                                });
                            </script>

                            <div class="form-group">
                                <label for="category">Slug  </label>
                                <div>


                                    <input type="text" id="slug" name="slug" readonly  class="form-control">
                                </div>
                            </div>




                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>





            </div>



            <div class="col-md-8 col-sm-6 col-xs-6">
                <div class="x_panel">

                    <div class="x_title">
                        <h2><i class="fa fa-tags"></i> Available Category  </h2>
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

                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th width="20%">#</th>
                                <th width="20%">Menu</th>
                                <th width="2%">Action</th></tr>
                            </thead>
                            <tbody>



                          @foreach($menus as $t)
                                <tr>

                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$t->menu}}</td>

                                    <td>

                                       <center>
                                        <a href="{{route('admin-product-menu-edit',['id'=>$t->id])}}"><span class="glyphicon glyphicon-edit" title="Edit" style="font-size:15px;color:limegreen"></span></a>

                                        <form action="{{route('admin-product-menu-delete',['id'=>$t->id])}}" method="post" class="pull-right">
                                            {{ csrf_field() }}
                                            <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"  title="Delete" style="font-size:15px;color:limegreen"></span></button>
                                        </form>

                                       </center>

                                    </td>


                                </tr>

                            @endforeach

                            </tbody>


                        </table>

                        <br>
                        <center>{{$menus->links()}}</center>




                    </div>
                </div>

            </div>

        </div>
    </div>










@endsection