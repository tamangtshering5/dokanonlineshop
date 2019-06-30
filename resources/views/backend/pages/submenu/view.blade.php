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


                        <h2><i class="fa fa-tags"></i>Product_views</h2>


                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">


                        @foreach($submenus as $submenu)
                            <div class="col-md-2">
                                <div class="card-container">
                                    <div class="card">
                                        <div class="card-image">
                                            @foreach($submenu->Submenuimage as $key => $subimg)
                                                 @if($key == 0)
                                            <img src="{{URL::to('frontend/image/product/'.$subimg->image)}}" style="width:3ra00px;">
                                                  @endif
                                              @endforeach
                                        </div>
                                        <div class="card-info">
                                            <div class="card-title">{{$submenu->title}}</div>
                                        </div>
                                        <div class="card-social">
                                            <ul>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                    &nbsp;&nbsp;<a href=""><button type="submit" class="btn btn-success btn-xs" title="delete" style="color: white;font-size: 15px;width:80px;">Edit</button></a>
                                <span class="pull-right"><form method="post" action="">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-danger btn-xs" title="delete" style="color: white;font-size: 15px;width:80px;">Delete</button>
                                </form>
                                    </span>

                            </div>
                            @endforeach




                    </div>
                </div>

            </div>

        </div>
    </div>












@endsection