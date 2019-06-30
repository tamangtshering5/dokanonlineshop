
<!-- ============================================== HEADER ============================================== -->
@extends('frontend.master1')
@section('body')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Contact</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="contact-page">
            <div class="row">

                <div class="col-md-12 contact-map outer-bottom-vs">
                    @foreach($infos as $info)
                    <iframe src="https://www.google.com/maps/embed?pb={{$info->googlemap}}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                @endforeach
                </div>

                <div class="col-md-9 contact-form">
                    <div class="col-md-12 contact-title">
                        <h4>Contact Form</h4>
                    </div>
                    <form action="{{route('contact_action')}}"  method="post">
                        {{csrf_field()}}
                        @if(session('success'))
                            <center>
                                <div class="alert alert-success alert-dismissible" style="width:800px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{session('success')}}</strong>
                                </div>

                            </center>
                        @endif
                        @if(session('error'))
                            <center>
                                <div class="alert alert-danger alert-dismissible" style="width:800px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{session('error')}}</strong>
                                </div>

                            </center>
                        @endif
                        @if(session('alert'))
                            <p class="alert alert-success"> {{session('alert')}}   </p>
                        @endif
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        @endif
                    <div class="col-md-4 ">

                            <div class="form-group">
                                <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="exampleInputName" name="name" >
                            </div>

                    </div>
                    <div class="col-md-4">

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="email" id="exampleInputEmail1" >
                            </div>

                    </div>
                    <div class="col-md-4">

                            <div class="form-group">
                                <label class="info-title" for="exampleInputTitle">Subject <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" name="subject" id="exampleInputTitle" >
                            </div>

                    </div>
                    <div class="col-md-12">

                            <div class="form-group">
                                <label class="info-title" for="exampleInputComments">Your Queries <span>*</span></label>
                                <textarea class="form-control unicase-form-control" name="message" id="exampleInputComments"></textarea>
                            </div>

                    </div>@captcha
                    {{--<div class="col-md-12 outer-bottom-small m-t-20">--}}
                        <input type="submit" class="btn-upper btn btn-primary checkout-page-button" value="send" style="color: white">
                    {{--</div>--}}
                    </form>
                </div>

                <div class="col-md-3 contact-info">
                    <div class="contact-title">
                        <h4>Contact Information</h4>
                    </div>
                    <div class="clearfix address">
                        <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                        <span class="contact-span">Kalanki, Kathmandu, Nepal </span>
                    </div>
                    <div class="clearfix phone-no">
                        <span class="contact-i"><i class="fa fa-mobile"></i></span>
                        <span class="contact-span">+977-01-5218249<br>9851143360,9802543360</span>
                    </div>
                    <div class="clearfix email">
                        <span class="contact-i"><i class="fa fa-envelope"></i></span>
                        <span class="contact-span"><a href="#">info@dokanonlineshopping.com</a></span>
                    </div>
                </div>
            </div><!-- /.contact-page -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <section class="bottom-section">
        <div class="container">
            <div class="row">
               @endsection
