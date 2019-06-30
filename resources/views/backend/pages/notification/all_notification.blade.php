@extends('backend.master')
@section('body')




    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-2 "></div>
            <div class=" col-lg-8">
                <div class="x_panel">
                    @if(session('alert'))
                        <p class="alert alert-success"> {{session('alert')}}   </p>
                    @endif
                    @if(session('success'))
                        <p class="alert alert-success">{{session('success')}}</p>

                    @endif
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif
                    <div class="x_title">
                        <h2>Customer Messages <small>recent</small> <a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></h2>
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

                                @foreach($datas as $message)
                                    <li>
                                        <div class="block">
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>{{$message->first_name}}</a>
                                                </h2>
                                                <div class="byline">
                                                    <a href="{{route('allbooking-view',['id'=>$message->id])}}"> <span>{{ \Carbon\Carbon::parse($message->created_at)->format('l j F Y')}}</span> by   {{$message->email}} &nbsp; |
                                                        invoice no.<b>{{$message->invoice_no}}</b>
                                                        @if($message->delivery_status == 0)
                                                            <h2>Order Pending</h2>
                                                            @else
                                                            <h2>Delivered</h2>
                                                    @endif</a>
                                                </div>
                                                <p class="excerpt"></p></a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        {{$datas->links()}}
                    </div>
                </div>
            </div>
        </div>










    </div>
@endsection

