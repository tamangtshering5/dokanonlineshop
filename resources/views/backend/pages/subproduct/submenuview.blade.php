@extends('backend.master')
@section('body')



    <div class="right_col" role="main">






        <div class="col-md-12 col-sm-12 col-xs-12">



            <div class="x_panel">

                <div class="x_title">
                    <h2>

                        <form action="{{route('admin-product-submenu-search')}}" method="get">
                            {{csrf_field()}}

                            <select class="form-control" name="productmenu_id"  id="productmenu_id" style="width:200px;">
                                <option value="0">All</option>
                                @foreach($menus as $menu)
                                    <option value="{{$menu->id}}">{{$menu->menu}}</option>
                                @endforeach
                            </select>

                            <button class="btn btn-md btn-primary" type="submit" style="margin-left:205px;margin-top:-50px;">Search</button>

                        </form>




                    </h2>

                    @include('backend.includes.message')


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

                    <table class="table table-bordered table-striped " id="products" >
                        <thead style="background-color: darkslategrey;color:white;">
                            <th>#</th>
                            <th width="20%">Category</th>
                            <th width="20%">Name</th>
                            <th>Price</th>
                            <th>View</th>
                            <th>Image&nbsp;(Main)</th>
                            <th>Action</th>

                        </thead>

                        <tbody id="productContent">
                         @foreach($submenus as $sm)

                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$sm->Productmenu->menu}}</td>
                                <td>{{$sm->name}}</td>
                                <td>Rs.{{$sm->price}}</td>
                                <td>{{$sm->view}}</td>
                                <td><center>
                                        @foreach($sm->Productsubmenuimage as $smp)
                                            @if($smp->type == 1)
                                        <img src="{{URL::to('/frontend/image/productsubmenu/'.$smp->image)}}" width="100px" class="img-circle" height="80px">

                                            @endif
                                            @endforeach
                                    </center></td>

                                <td style="width:5%;">


                                        <a href="{{route('admin-product-submenu-edit',['id'=>$sm->id])}}"><button class="btn btn-md btn-primary" style="width:65px;">Edit</button></a>

                                        <form action="{{route('admin-product-submenu-delete',['id'=>$sm->id])}}" method="post" class="pull-right">
                                            {{ csrf_field() }}
                                            <button class="btn btn-md btn-danger" style="width:65px;">Delete</button>
                                        </form>



                                </td>
                            </tr>

                             @endforeach
                        </tbody>


                    </table>
                                 <center>{{$submenus->links()}}</center>

                </div>
            </div>
        </div>







    </div>


@endsection