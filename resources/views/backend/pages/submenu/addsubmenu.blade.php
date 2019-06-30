@extends('backend.master')
@section('body')




    {{--/////////////////////////////////////////////////////--}}

    <div class="right_col" role="main">

        <div style="margin-top:65px;">
            @include('backend.includes.message')
        </div>


        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="x_panel">

                    <div class="x_title">
                        <h2><i class="fa fa-tag"></i>&nbsp; Add SubMenu </h2>
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
                              action="{{route('admin-submenu-add')}}" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="category">Category:  </label>
                                    <div>

                                        <select class="form-control" name="category_id" id="category" required>

                                            <option value="">Choose</option>
                                            @foreach($category as $cat)
                                                <option value="{{$cat->id}}">{{$cat->category}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                <script type="text/javascript">

                                    $(document).ready(function(){

                                        $(document).on('change','#category',function(){

                                            var a = $(this).val();

                                            $.ajax({

                                                type:'get',
                                                url: '{{URL::to('Dashboard/Menu_choose')}}',
                                                data:{'id':a},
                                                success:function(datas){

                                                    $("select#menu").empty();
                                                    $.each(datas,function(i,data){
                                                        $("select#menu").append('<option value="'+data.id+'"> '+data.menu+'</option>');
                                                    });


                                                }
                                            });

                                        });
                                    });

                                </script>


                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="category">Menu:  </label>
                                    <div>

                                        <select class="form-control" name="menu_id" id="menu" >

                                            <option value="0">Choose</option>

                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                    <label for="category">Title: </label>
                                    <div>


                                        <input type="text" id="name" name="title" required  class="form-control">
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

                                <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                    <label for="category">Slug:  </label>
                                    <div>


                                        <input type="text" id="slug" name="slug" readonly  class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="ln_solid"></div>
                            <center>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </center>
                        </form>
                    </div>
                </div>





            </div>



            <div class="col-md-8 col-sm-6 col-xs-6">
                <div class="x_panel">

                    <div class="x_title">
                        <h2><i class="fa fa-tags"></i> Available SubMenu  </h2>
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
                                <th width="20%">SubMenu</th>
                                <th width="2%">Action</th></tr>
                            </thead>
                            <tbody>



                            @foreach($submenu as $sub)
                                <tr>

                                    <td>{{$loop->index+1}}</td>
                                    @foreach(App\Model\Category::where('id','=',$sub->category_id)->get() as $ca)
                                    <td>{{$ca->category}}</td>
                                    @endforeach
                                    @foreach(App\Model\Menu::where('id','=',$sub->menu_id)->get() as $men)
                                    <td>{{$men->menu}}</td>
                                    @endforeach
                                    <td>{{$sub->title}}</td>

                                    <td>

                                        <center>
                                            <a href="{{route('admin-submenu-edit',['id'=>$sub->id])}}"><button class="btn btn-xs btn-success"  style="width:70px;">Edit</button></a>

                                            <form action="{{route('admin-submenu-delete',['id'=>$sub->id])}}" method="post">
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
                        <center>{{$submenu->links()}}</center>




                    </div>
                </div>

            </div>

        </div>
    </div>











@endsection