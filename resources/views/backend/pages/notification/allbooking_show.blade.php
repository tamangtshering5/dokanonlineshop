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
                                        <a href="{{route('allbooking-message')}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger">Back</button>&nbsp;</a>
                                    </div>


                                    <div class="btn-group pull-right">
                                        <a href="{{route('allbooking-delete',['id'=>$datas->id])}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger">Delete</button>&nbsp;</a>
                                        


                                    </div>
                                    <div class="clearfix"></div>
                                    <br>

                                    @include('backend.includes.message')

                                    <br><div class="block_content">

                                        <div class="byline">
                                            <span>{{ \Carbon\Carbon::parse($datas->created_at)->format('l j F Y')}}</span>   &nbsp;
                                        </div>
                                        <br>
                                        <h2 class="title">
                                            <b><a style="color:black">First Name</a></b> : {{$datas->first_name}}<br><br>
                                            <b><a style="color:black">Middle Name</a></b> : {{$datas->middle_name}}<br><br>
                                            <b><a style="color:black">Last Name</a></b> : {{$datas->last_name}}<br><br>

                                            <b><a style="color:black">Email </a></b>:&nbsp; {{$datas->email}}<br><br>

                                            <b><a style="color:black">Phone1 </a></b>:&nbsp;&nbsp;{{$datas->phone1}} <br><br>
                                            <b><a style="color:black">Phone2 </a></b>:&nbsp;&nbsp;{{$datas->phone2}} <br><br>
                                            <b><a style="color:black">Province </a></b>:&nbsp; {{$datas->province}}<br><br>
                                            <b><a style="color:black">District </a></b>:&nbsp; {{$datas->district}}<br><br>
                                            <b><a style="color:black">City </a></b>:&nbsp; {{$datas->city}}<br><br>
                                            <b><a style="color:black">Invoice no </a></b>:&nbsp; {{$datas->invoice_no}}<br><br>
                                            <b><a style="color:black">Product Name </a></b>:&nbsp; {{$datas->product_name}}<br><br>
                                            <b><a style="color:black">Qty </a></b>:&nbsp; {{$datas->qty}}<br><br>

                                            <b><a style="color:black">Order Date </a></b>:&nbsp;&nbsp;{{$datas->created_at}} <br><br>



                                        </h2>

                                        <form class="form-horizontal form-label-left" method="post" action="{{route('status_update',['id'=>$datas->id])}}">
                                            {{csrf_field()}}
                                            <div class="form-group col-lg-4" >
                                                <label for="select-from">Delivery Status:</label>

                                                <select class="form-control" id="new" name="delivery">

                                                    <option value="1" @if($datas->delivery_status=='1') selected @endif>Delivered </option>
                                                    <option value="0"@if($datas->delivery_status=='0') selected @endif >Order Pending </option>

                                                </select>

                                            </div>


                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>

                                        </form>
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