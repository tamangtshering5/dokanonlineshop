<div class="body-content outer-top-vs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($slider as $slide)
                        <div class="item" style="background-image: url({{URL::to('frontend/image/slider/'.$slide->image)}});">
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.owl-carousel -->
                </div>
            </div>
        </div>

        <!-- ============================================== banners ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
@foreach($advert as $adv)
                <div class="col-md-6 col-sm-6">
                    <div class="wide-banner cnt-strip">
                        <div class="image"> <a href="{{$adv->url}}"><img class="img-responsive" src="{{URL::to('backend/images/advertisement/'.$adv->image)}}" alt="" style="height:180px;width:600px;"> </a></div>
                    </div>
                    <!-- /.wide-banner -->
                </div>
                @endforeach
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>