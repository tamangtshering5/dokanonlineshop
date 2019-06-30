<section class="bottom-section">
    <div class="container">
        <div class="row">


            <!-- ============================================== SPECIAL OFFER ============================================== -->
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Top Rated</h3>
                    <div class="sidebar-widget-body">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme">
                            @foreach($rated->chunk(4) as $rates)
                            <div class="item">
                                <div class="products special-product">
                                   @foreach($rates as $rate)
                                       
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-4">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{route('product_details',['slug'=>$rate->slug])}}"> <img src="{{URL::to('backend/images/products/'.$rate->image)}}" alt="image"> </a> </div>
                                                        <!-- /.image -->
                                                           
                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-8">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{route('product_details',['slug'=>$rate->slug])}}">{{$rate->product_name}}</a></h3>
                                                        <div {{--class="rating rateit-small"--}}>
                                                             @for($i=1;$i<=5;$i++)
                                                                @if($rate->rating>=$i)
                                                                    <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <div class="product-price"> <span class="price"> {{$rate->new_price}} </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                        
                                        @endforeach
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->


            </div>
            <!-- ============================================== SPECIAL OFFER : END ============================================== -->
<!--/////commmrm-->


<!--//////coommd-->


                                        

        <!-- ============================================== HOT DEALS ============================================== -->

           {{-- <h1>Countdown Clock</h1>--}}

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="sidebar-widget outer-bottom-small hot-deals wow fadeInUp ">
                    <h3 class="section-title">hot deals</h3>
                    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme ">
                        @foreach($hotdeal as $key=>$hot)
                        <div class="item">
                            <div class="products">
                                <div class="hot-deal-wrapper">
                                    <div class="image"> <img src="{{URL::to('backend/images/products/'.$hot->image)}}" alt="" style="height:273px;"> </div>
                                    @if($hot->discount != null)
                                        <div class="sale-offer-tag"><span>{{$hot->discount}}%<br>
                    off</span></div>@endif
                                    <div class="{{--timing-wrapper--}}">

                                        <div class="box-wrapper">
                                            <h1 id="countdown-holder"></h1>
                                            <h3 id="demo{{$key}}"></h3>
{{--
                                            <div class="date box"> <span class="key" id="days"></span> <span class="value">DAYS</span> </div>
--}}
                                        </div>
                                        <input type="hidden" value="{{--Jan 5, 2019 15:37:25--}}{{$hot->eventdate}}" id="event{{$key}}">
                                        {{--<div class="box-wrapper">
                                            <div class="hour box"> <span class="key" id="hours"></span> <span class="value">HRS</span> </div>
                                        </div>
                                        <div class="box-wrapper">
                                            <div class="minutes box"> <span class="key" id="mins"></span> <span class="value">MINS</span> </div>
                                        </div>
                                        <div class="box-wrapper hidden-md">
                                            <div class="seconds box"> <span class="key" id="sec"></span> <span class="value">SEC</span> </div>
                                        </div>--}}





                                        <!--<script>
                                            // Set the date we're counting down to
                                            var countDownDate = new Date(document.getElementById("event{{$key}}").value).getTime();
                                            /*console.log(countDownDate);*/
                                            // Update the count down every 1 second
                                            var x = setInterval(function() {

                                                // Get todays date and time
                                                var now = new Date().getTime();

                                                // Find the distance between now and the count down date
                                                var distance = countDownDate - now;

                                                // Time calculations for days, hours, minutes and seconds
                                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                // Output the result in an element with id="demo"
                                                document.getElementById("demo{{$key}}").innerHTML = days + "d " + hours + "h "
                                                    + minutes + "m " + seconds + "s ";

//                                                console.log(days + "d " + hours + "h "
//                                                    + minutes + "m " + seconds + "s ");
                                                // If the count down is over, write some text
                                                if (distance < 0) {
                                                    clearInterval(x);
                                                    document.getElementById("demo{{$key}}").innerHTML = "EXPIRED";
                                                }
                                            }, 1000);
                                        </script>-->
                                    </div>
                                </div>
                                <!-- /.hot-deal-wrapper -->

                                <div class="product-info text-left m-t-20">
                                    <h3 class="name"><a href="{{route('hotdeal_details',['slug'=>$hot->slug])}}">{{$hot->product_name}}</a></h3>
                                     <div {{--class="rating rateit-small"--}}>
                                                            @for($i=1;$i<=5;$i++)
                                                                @if($hot->rating>=$i)
                                                                    <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                                                @endif
                                                            @endfor
                                                        </div>
                                    <div class="product-price"> <span class="price">Rs.{{$hot->new_price}} </span> <span class="price-before-discount">Rs.{{$hot->old_price}}</span> </div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->

                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <div class="add-cart-button btn-group">
                                           {{-- <a href="{{route('addcart',['slug'=>$hot->slug])}}"> <button class="btn btn-primary icon" type="button"> Add to cart <i class="fa fa-shopping-cart"></i> </button></a>--}}
                                            <a href="{{route('hotaddcart',['slug'=>$hot->slug])}}"><button class="cart-btn-bg" type="button">Add to cart</button></a>
                                        </div>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                        </div>
                            @endforeach

                    </div>
                    <!-- /.sidebar-widget -->
                </div>
            </div>
            <!-- ============================================== HOT DEALS: END ============================================== -->

            <!-- ============================================== SPECIAL DEALS ============================================== -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Deals</h3>
                    <div class="sidebar-widget-body">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme">
                            @foreach($special->chunk(4) as $spe)
                            <div class="item">
                                <div class="products special-product">
                                   @foreach($spe as $pro)
                                       @if($pro->special == 1)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-4">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{route('product_details',['slug'=>$pro->slug])}}"> <img src="{{URL::to('backend/images/products/'.$pro->image)}}" alt="image"> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-8">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">{{$pro->product_name}}</a></h3>
                                                        <div {{--class="rating rateit-small"--}}>
                                                            @for($i=1;$i<=5;$i++)
                                                                @if($pro->rating>=$i)
                                                                    <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <div class="product-price"> <span class="price"> {{$pro->new_price}} </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                        @endif
                                        @endforeach
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->


            </div>
            <!-- ============================================== INFO BOXES : END ============================================== -->
        
        
        </div>
        </div>
        </section>
   