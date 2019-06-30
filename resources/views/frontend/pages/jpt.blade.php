
        <!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{URL::to('frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/table.css')}}">
    {{--<style>
        .table-bordered th, .table-bordered td { border: 1px solid #000000 !important }
    </style>
    <style>
        p {
            text-align: center;
            font-size: 20px;
            margin-top: 0px;
        }
    </style>--}}
</head>
<body>
<div class="container">

    <div class="row pad-top-botm ">
        <center>
        <div class="col-lg-8 col-md-6 col-sm-6 " >
            @foreach($logo as $log)
            <img src="{{URL::to('frontend/image/logo/'.$log->image)}}" />
                @endforeach
        </div>
        </center>
        <div class="col-lg-4 col-md-6 col-sm-6">
            @foreach($infos as $info)

                <strong>   Dokan Online Shopping</strong>
                <br />
                <strong>Address :</strong> {{$info->address}}
                <br>
                <strong>Email : {{$info->email}}</strong>
                <br>

                <strong>Call : </strong>  {{$info->phone1}} || {{$info->phone2}}
            @endforeach
        </div>
    </div>

    <hr>
    <center>
        <div class="container">
            <div class="row">
                @foreach($lastdatas as $lastdata)
                    <h3 class="text-center text-success">Invoice Number: DOK-{{$lastdata->invoice_no}}</h3>
                @endforeach
                <div  class="row pad-top-botm client-info">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        @foreach($lastdatas as $lastdata)
                            <h4>  <strong>Delivery Information</strong></h4>
                            <strong>  {{$lastdata->first_name}} {{$lastdata->last_name}}</strong>
                            <br />
                            <b>City :</b> {{$lastdata->city}}
                            <br />
                            <b>District :</b> {{$lastdata->district}}
                            <br />
                            <b>Province No. :</b> {{$lastdata->province}}
                            <br />
                            <b>Call :</b> {{$lastdata->phone1}} || {{$lastdata->phone2}}
                            <br />
                            <b>E-mail :</b> {{$lastdata->email}}
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        @foreach($lastdatas as $lastdata)
                        <h4>  <strong>Payment Details </strong></h4>
                        <b>Bill Amount :  Rs. 5700 </b>
                        <br />
                        Bill Date :  {{$lastdata->created_at}}
                            <hr />
                        <br />
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </center>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="table-responsive">
                <center><table class="table table-striped table-bordered table-list" >
                        <thead>

                        <tr>

                            <th>S. No.</th>
                            <th>Perticulars</th>
                            <th>Quantity.</th>
                            <th>Rate</th>
                            <th>Total Price</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartitems as $cartitem)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$cartitem->name}}</td>
                                <td>{{$cartitem->qty}}</td>
                                <td>Rs. {{$cartitem->price}}</td>
                                <td>Rs. {{Cart::total()}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </center>
            </div>
            <hr />
            <div class="ttl-amts">
                <h4 class="text-danger">  Total Amount : Rs. {{Cart::total()}} </h4>
            </div>
            <hr />
            {{--<div class="ttl-amts">
                <h4 class="text-danger">  Discount : 0% </h4>
            </div>
            <hr />--}}

            <div class="ttl-amts">
                <h4 class="text-danger">  Shipping Cost : Rs. 100 </h4>
            </div>
            <hr />
            <div class="ttl-amts">
                <h3 class="text-primary"> <strong>Bill Amount :Rs. {{(Cart::total()+100)}}</strong> </h3>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
            <ol>
                <li>
                    This is an electronic generated invoice so doesn't require any signature.

                </li>
                <li>
                    Please read all terms and polices on  www.dokanonlineshopping.com for returns, replacement and other issues.

                </li>
            </ol>
        </div>
    </div>

    <div class="row pad-top-botm">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <hr />
            {{--<a href="#" class="btn btn-primary btn-lg" style="width: 150px; height: 50px; font-size:20px; line-height: 35px;" >Print Invoice</a>--}}
            &nbsp;&nbsp;&nbsp;
            <a href="{{route('jptdownload')}}" class="btn btn-primary btn-lg" style="width: 170px; height: 50px; font-size:20px; line-height: 35px;" >Download PDF</a>

        </div>
    </div>

</div>
{{--<p>hello world</p>
<table>
    <tbody>
    @foreach($data as $dat)
    <tr>
        <td>{{$dat->product_name}}</td>
    </tr>
        @endforeach
    </tbody>
</table><br>

<table>
    <tbody>
    @foreach($cartitems as $cartitem)
        <tr>
            <td>{{$cartitem->price}}</td>
        </tr>
    @endforeach
    </tbody>
</table><br>

<table>
    <tbody>
    @foreach($cata as $cat)
        <tr>
            <td>{{$cat->category}}</td>
        </tr>
    @endforeach
    </tbody>
</table><br>

<table>
    <tbody>
    @foreach($submenu as $sub)
        <tr>
            <td>{{$sub->title}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{route('jptdownload')}}"><h1>download</h1></a>--}}
</body>
</html>

