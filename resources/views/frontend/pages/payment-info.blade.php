
<!-- ============================================== HEADER ============================================== -->
@extends('frontend.master1')
@section('body')


<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="index.php">Home</a></li>
                <li class='active'>Payment Information</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info text-center" role="alert">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <span class="sr-only">Error:</span>
                What are the payment options available for Dokan Online?
            </div>

            <div class="panel panel-default">
                <div class="panel-body" style="background-color:#5cb85c; color: white; font-weight: bold; font-size:15px;">
                    Esewa
                </div>

                <div class="panel-footer">
                    eSewa is a Digital Payment Portal which allows you to make online and offline payments to various merchants, transfer funds to various banks and many more. To buy product from Dokan Online, you just need to send your exact bill amount to any of these mobile numbers:
                    <br><br>
                    @foreach($infos as $info)
                        1.{{$info->phone1}}<br>
                        2.{{$info->phone2}}<br><br>
                    @endforeach

                    Once the amount is sent, your orders will be shipped to you the next days.
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body" style="background-color:#428bca; color: white; font-weight: bold; font-size:15px;">
                    Khalti
                </div>

                <div class="panel-footer">
                    Khalti is a digital wallet for instant, secure and hassle-free online payments in Nepal. Recharge your mobiles, pay bills, book tickets wherever you are and whenever you want. To buy product from Dokan Online, you just need to send your exact bill amount to any of these mobile numbers:
                    <br><br>
                    @foreach($infos as $info)
                        1.{{$info->phone1}}<br>
                        2.{{$info->phone2}}<br><br>
                    @endforeach
                    Once the amount is sent, your orders will be shipped to you the next days.


                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body" style="background-color:#d9534f; color: white; font-weight: bold; font-size:15px;">
                    IME
                </div>

                <div class="panel-footer">
                    IME feature is only for the products that are need to be shipped outside the capital. For delivery inside Kathmandu, you can give cash on delivery or if you want you can send amoung through IME. After payment is done by you through IME, you just need to enter the 11 digit code in the form while ordering. Once the payment is received, then it will be shipped. The shipping may take 2-3 days for outside valley.
                </div>
            </div>
        </div>
    </div>
</div>



<section class="bottom-section">
    <div class="container">

@endsection