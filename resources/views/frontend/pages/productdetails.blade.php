@extends('frontend.master1')
@section('body')

<!-- ============================================== HEADER : END ============================================== -->

    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="breadcrumb">
                <li><a href="{{route('dashboard')}}">Home</a></li>
                <li>{{$catalink->category}}</li>
                <li class='active'>{{$detailimg->product_name}}</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->


<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    {{--<div class="home-banner outer-top-n">
                        <img src="{{URL::to('frontend/images/banners/LHS-banner.jpg')}}" alt="Image">
                    </div>--}}



                    <!-- ============================================== HOT DEALS ============================================== -->
                    @foreach($advert as $adv)
                    <div class=" hot-deals wow fadeInUp outer-top-vs">

                        <div class="owl-carousel sidebar-carousel owl-theme">
                            <div class="home-banner outer-top-n">
                                <a href="{{$adv->url}}"><img src="{{URL::to('backend/images/advertisement/'.$adv->image)}}" style="height:325px;width:260px;"></a>
                            </div>
                        </div><!-- /.sidebar-widget -->
                    </div>
                    @endforeach
                    <!-- ============================================== HOT DEALS: END ============================================== -->
                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="bzoom_wrap" style="height: 485px;">
                                <ul id="bzoom">
                                    @foreach(App\DetailImage::where('Product_id','=',$detailimg->id)->get() as $img)
                                    <li>
                                        <img class="bzoom_thumb_image" src="{{URL::to('backend/images/products/'.$img->images)}}" title="first img" />
                                        <img class="bzoom_big_image" src="{{URL::to('backend/images/products/'.$img->images)}}"/>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name">{{$detailimg->product_name}}</h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div {{--class="rating rateit-small"--}}>
                                                @for($i=1;$i<=5;$i++)
                                                    @if($detailimg->rating>=$i)
                                                        <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">

                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <h4><strong>Availability:</strong><small> {{$detailimg->availability}}</small></h4>
                                            <h4><strong>Brand:</strong><small> {{$detailimg->brand}}</small></h4>
                                            <h4><strong>Manufactured In:</strong><small> {{$detailimg->manufactured}}</small></h4>
                                            <h4><strong>Delivery:</strong><small> {{$detailimg->delivery}}</small></h4>



                                        </div>



                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->




                                <div class="price-container info-container m-t-20">
                                    <div class="row">


                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                <span class="price">{{$detailimg->new_price}}</span>
                                                <span class="price-strike">{{$detailimg->old_price}}</span>
                                            </div>
                                        </div>

                                    

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        {{--<div class="col-sm-2">
                                            <span class="label">Qty :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                       --}}{{-- <input type="hidden" value="{{$cartitem->rowId}}" id="hidden{{$cartitem->id}}">
                                                        <input type="number"  min="1" value="{{$cartitem->qty}}" class="qty{{$cartitem->id}}" >--}}{{--
                                                    </div>
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </div>--}}

                                        <div class="col-sm-7">
                                            <a href="{{route('addcart',['slug'=>$detailimg->slug])}}" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->
                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>


                <div class="product-tabs inner-bottom-xs  wow fadeInUp">

                    <div class="row">
                        <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                            <li class="active"><a data-toggle="tab" href="#description" style="width: 150px; margin-top:-1px;">DESCRIPTION</a></li>

                        </ul>

                        <hr style="height:2px; margin-top:0px;">

                        <div class="col-sm-12">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">{!! $detailimg->detail !!}</p>
                                    </div>
                                </div><!-- /.tab-pane -->

                            

                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

            </div><!-- /.col -->
            <div class="col-md-12">




                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
               @include('frontend.includes.featured')
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
            </div>
            <div class="clearfix"></div>
        </div><!-- /.row -->	</div><!-- /.container -->
</div><!-- /.body-content -->


@include('frontend.includes.rated')

@endsection




