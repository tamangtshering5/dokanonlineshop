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
                        <h2><i class="fa fa-tag"></i>&nbsp; Edit Menu </h2>
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
                              action="{{route('admin-menu-update',['id'=>$datas->id])}}" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="category">Category <span class="required">*</span> </label>
                                <div>
                                    <select name="category_id" id="category" required class="form-control">
                                        <option value="{{$datas->Category->id}}">{{$datas->Category->category}}</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>


                            {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                            <script type="text/javascript">

                                $(document).ready(function(){

                                    $(document).on('change','#category',function(){

                                        var a = $(this).val();
                                        $.ajax({

                                            type:'get',
                                            url: '{{URL::to('Dashboard/Menu_choose')}}',
                                            data:{'id':a},
                                            success:function(datas){

                                                $("select#subcat").empty();
                                                $.each(datas,function(i,data){


                                                    $("select#subcat").append('<option value="'+data.id+'"> '+data.id+'</option>');
                                                });
                                            }
                                        });

                                    });
                                });

                            </script>--}}



                            <div class="form-group">
                                <label for="category">Menu <span class="required">*</span> </label>
                                <div>


                                    <input type="text" id="name" name="menu" value="{{$datas->menu}}" required  class="form-control">
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


                                    <input type="text" id="slug" name="slug" value="{{$datas->slug}}" readonly  class="form-control">
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
                        <h2><i class="fa fa-tags"></i> Available Menu  </h2>
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
                                <th width="20%">Category</th>
                                <th width="20%">Menu</th>
                                <th width="2%">Action</th></tr>
                            </thead>
                            <tbody>



                            @foreach($menus as $menu)
                                <tr>

                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$menu->Category->category}}</td>
                                    <td>{{$menu->menu}}</td>

                                    <td>

                                        <center>
                                            <a href="{{route('admin-menu-edit',['id'=>$menu->id])}}"><button class="btn btn-xs btn-success"  style="width:70px;">Edit</button></a>

                                            <form action="{{route('admin-menu-delete',['id'=>$menu->id])}}" method="post">
                                                {{ csrf_field() }}
                                                <button class="btn btn-xs btn-danger" type="submit" style="width:70px;">Delete</button>
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