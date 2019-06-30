<section class="bottom-section">
    <div class="container">
<div class="newsletter wow fadeInUp">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <h3>Subcribe Now <strong>Get Notified</strong></h3>
            <div class="sidebar-widget-body">
                <p><strong> For every new products</strong></p>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email address">  <button class="btn btn-primary">Subscribe</button>
            </div>


        </div>
    </div>
</div>
<!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->
</section>



<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <address>
                        <ul class="toggle-footer" style="">
                            @foreach($infos as $info)
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>{{$info->address}}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p> {{$info->phone1}}<br>
                                       {{$info->phone2}}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body outer-top-xsm"> <span>{{$info->email}}</span> </div>
                            </li>
                                @endforeach
                        </ul>
                    </address>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{route('terms_conditions')}}">Terms & Conditions</a></li>
                            <li><a href="{{route('faq')}}">FAQ</a></li>
                            <li class="last"><a href="{{route('refund')}}" title="Where is my order?">Refund Policy</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href="{{route('about_us')}}">About Dokan online</a></li>
                            <li><a title="payment_information" href="{{route('payment')}}">Payment Information</a> </li>
                            <li><a title="partners" href="{{route('contact')}}">Contact Us</a></li>

                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Follow Us On</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            @foreach($infos as $info)
                            <li ><a href="{{$info->fblink}}" target="_blank"><button class="btn btn-sm" style="height: 30px; background-color:blue; color:white; width: 100px; margin-top:3px;" ><i class="fa fa-facebook" aria-hidden="true" style="width: 20px; margin-left:-10px;"></i>Facebook</button></a></li>
                            <li><a href="{{$info->fblink}}" target="_blank"><button class="btn btn-sm" style="height: 30px; background-color:red; color:white; width: 100px; margin-top:3px;"><i class="fa fa-instagram" aria-hidden="true" style="width: 20px; margin-left:-10px;"></i>Instagram</button></a></li>
                            <li><a href="{{$info->twitterlink}}" target="_blank"><button class="btn btn-sm" style="height: 30px; background-color:#c035ed; color:white; width: 100px; margin-top:3px;"><i class="fa fa-twitter" aria-hidden="true" style="width: 20px; margin-left:-10px;"></i>Twitter</button></a></li>
                            <li><a href="{{$info->googlelink}}" target="_blank"><button class="btn btn-sm" style="height: 30px; background-color:red; color:white; width: 100px;"><i class="fa fa-google" aria-hidden="true" style="width: 20px; margin-left:-10px;"></i>Gmail</button></a></li>
                            @endforeach
                        </ul>

                    </div>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <p><h5 style="color:white;"> <i class="fa fa-copyright"></i> Copyright Dokan Online Shopping. Powered by Grafias Technology</h5></p>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="assets/images/payment/1.jpg" alt=""></li>
                        <li><img src="assets/images/payment/2.jpg" alt=""></li>
                        <li><img src="assets/images/payment/3.jpg" alt=""></li>
                        <li><img src="assets/images/payment/4.png" alt=""></li>
                        <li><img src="assets/images/payment/5.png" alt=""></li>
                    </ul>
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>