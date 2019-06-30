@extends('backend.master')
@section('body')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-2 "></div>
            <div class=" col-lg-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Customer Messages <small>recent</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">

                            <ul class="list-unstyled timeline widget">

                                <li>
                                    <div class="btn-group pull-left">
                                        <a href="{{route('allbooking-view',['id'=>$id])}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger">Cancel</button>&nbsp;</a>
                                    </div>


                                    <div class="btn-group pull-right">

                                        <form action="{{route('allbooking-delete-action',['id'=>$id])}}" method="post">
                                            {{ csrf_field() }}

                                            <button class="btn btn-md btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></button>
                                            {{--<a class="btn btn-md btn-danger pull-right" title='delete message'><i class='fa fa-trash'></i>--}}
                                        </form>


                                    </div>
                                    <div class="clearfix"></div>
                                    <br>

                                    @include('backend.includes.message')

                                    <br><div class="block_content">

                                        <h2>Are you sure you want to delete?</h2>
                                        <br>
                                    </div>
                            </ul>
                        </div>
                        </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection