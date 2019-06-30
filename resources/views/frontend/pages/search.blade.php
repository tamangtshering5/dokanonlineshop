@extends('frontend.master1')
@section('body')

    <!-- shop container start here -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-3">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                                        <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>


                        {{--<div class="col col-sm-6 col-md-3 text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container --> </div>--}}
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach( $products as $subprod)
                                            <div class="col-sm-6 col-md-3 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{route('product_details',['slug'=>$subprod->slug])}}"><img src="{{URL::to('backend/images/products/'.$subprod->image)}}" alt=""></a> </div>
                                                            <!-- /.image -->


                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{route('product_details',['slug'=>$subprod->slug])}}">{{$subprod->product_name}}</a></h3>
                                                            <div {{--class="rating rateit-small"--}}>
                                                                @for($i=1;$i<=5;$i++)
                                                                    @if($subprod->rating>=$i)
                                                                        <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div class="description"></div>
                                                            <div class="product-price"> <span class="price"> Rs.{{$subprod->new_price}} </span> <span class="price-before-discount">Rs.{{$subprod->old_price}}</span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group" style="margin-left: -10px;">
                                                                        <a href="{{route('addcart',['slug'=>$subprod->slug])}}"><button class="btn btn-primary icon" type="button">Add to cart <i class="fa fa-shopping-cart"></i> </button></a>
                                                                        <button class="btn btn-primary cart-btn" type="button"></button>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->
                                        @endforeach

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>

                            <!-- /.tab-pane -->

                            <div class="tab-pane "  id="list-container">
                                <div class="category-product">
                                    @foreach( $products as $subprod)

                                        <div class="category-product-inner wow fadeInUp">
                                            <div class="products">
                                                <div class="product-list product">
                                                    <div class="row product-list-row">
                                                        <div class="col col-sm-4 col-lg-4">
                                                            <div class="product-image">
                                                                <div class="image"> <img src="{{URL::to('backend/images/products/'.$subprod->image)}}" alt=""> </div>
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-sm-8 col-lg-8">
                                                            <div class="product-info">
                                                                <h3 class="name"><a href="{{route('product_details',['slug'=>$subprod->slug])}}">{{$subprod->product_name}}</a></h3>
                                                                <div {{--class="rating rateit-small"--}}>
                                                                    @for($i=1;$i<=5;$i++)
                                                                        @if($subprod->rating>=$i)
                                                                            <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                                <div class="product-price"> <span class="price"> Rs.{{$subprod->new_price}} </span> <span class="price-before-discount">Rs.{{$subprod->old_price}}</span> </div>
                                                                <!-- /.product-price -->
                                                                <div class="description m-t-10">{!! $subprod->detail !!}</div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <a href="{{route('addcart',['slug'=>$subprod->slug])}}"><button class="btn btn-primary icon"  type="button"> <i class="fa fa-shopping-cart"></i> </button></a>
                                                                                <button class="btn btn-primary cart-btn" type="button"><a href="{{route('addcart',['slug'=>$subprod->slug])}}">Add to cart</a></button>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </div>
                                                                <!-- /.cart -->

                                                            </div>
                                                            <!-- /.product-info -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-list-row -->
                                                    <div class="tag new"><span>new</span></div>
                                                </div>
                                                <!-- /.product-list -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.category-product-inner -->
                                    @endforeach

                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->
                        <div class="clearfix filters-container">
                            <div class="text-right">
                                {{-- <div class="pagination-container">--}}
                                <div style="margin-left: 50%">
                                    {{-- {{$subproduct->links()}}--}}
                                </div>

                            {{--<ul class="list-inline list-unstyled">
                                <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>--}}
                            <!-- /.list-inline -->
                            {{--</div>--}}
                            <!-- /.pagination-container --> </div>
                            <!-- /.text-right -->

                        </div>
                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


            <!-- ============================================== banners ============================================== -->
            {{--<div class="container">
                <div class="row">
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            @foreach($advert as $ad)
                                <div class="col-md-6 col-sm-6">
                                    <div class="wide-banner cnt-strip">
                                        <div class="image"> <img class="img-responsive" src="{{URL::to('backend/images/advertisement/'.$ad->image)}}" alt="" style="height:150px;width:600px;"> </div>
                                    </div>
                                    <!-- /.wide-banner -->
                                </div>
                        @endforeach
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.wide-banners -->
                </div>
                <!-- /.breadcrumb -->

            </div>--}}
            <!-- /.container -->

        </div>
    </div>

    </div>

    <!-- shop container end here -->


@endsection
