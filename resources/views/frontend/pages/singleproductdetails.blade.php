@extends('frontend.master1')

@section('body')

    <div id="content">

        @if(Cart::count() > 0)


        @endif

        @include('backend.includes.message')

        <div class="main-detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="detail-gallery">
                            <ul class="bxslider">

                                @foreach($submenu->Productsubmenuimage as $pimg)
                                <li><img src="{{URL::to('frontend/image/productsubmenu/'.$pimg->image)}}" style="height:420px;width:100%;"/></li>
                                @endforeach

                            </ul>
                            <div class="bx-pager">

                                @foreach($submenu->Productsubmenuimage as $key=>$pimg)
                                <a data-slide-index="{{$key}}" href="#"><img src="{{URL::to('frontend/image/productsubmenu/'.$pimg->image)}}" style="height:80px;width:100px;"/></a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="detail-info">
                            <h2 class="title-detail">{{$submenu->name}}</h2>
                            <ul class="product-review">
                                <li>
                                    <div class="product-rating">
                                        <div style="width:100%" class="inner-rating"></div>
                                    </div>
                                </li>
                                <li>3 Review(s)</li>
                                <li><a href="#">Add your review</a></li>
                            </ul>
                            <ul class="product-code">
                                @if($submenu->available == 1)
                                <li><label>Available</label> <span>In Stock</span></li>
                                @else
                                    <li><label>Available</label> <span>Finished</span></li>
                                @endif


                                <li><label>#Code Products</label> <span>{{$submenu->product_code}}</span></li>
                            </ul>
                           {{-- <p class="desc">Cras idleo aliquet, dictum orci anlie varius ligula iekulop soon. Duis aliquet pellentes que tincid unt. Lorem Khaled Ipsum is a major key to success. Another one. The key is to enjoy life, because they don’t want you to enjoy life. </p>--}}
                            <div class="attr-detail">
                                <div class="attr-detail-box attr-detail-color">
                                    <strong class="label-attr">Color <sup>*</sup></strong>
                                    <select>
                                        <option value="">Choose a color that you like...</option>
                                        <option value="">Red</option>
                                        <option value="">Blue</option>
                                        <option value="">Green</option>
                                    </select>
                                </div>
                                <div class="attr-detail-box attr-detail-size">
                                    <strong class="label-attr">size <sup>*</sup></strong>
                                    <select>
                                        <option value="">Choose a size that you like...</option>
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                    </select>
                                </div>
                                <div class="attr-detail-box attr-detail-price">
                                    <strong class="label-attr">Price</strong>
                                    <div class="product-price">
                                        <strong>${{$submenu->price}}</strong>
                                    </div>
                                </div>
                                <div class="attr-detail-box attr-detail-qty">
                                    <strong class="label-attr">QTY</strong>
                                    <div class="info-qty">
                                        <a href="#" class="qty-down"><i class="fa fa-minus"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fa fa-plus"></i></a>
                                    </div>

                                    <div class="product-extra-link style2">

                                        <form action="{{route('cart.add')}}" method="POST">
                                            {{csrf_field()}}

                                            <input type="hidden" name="id" value="{{$submenu->id}}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="proname" value="{{$submenu->name}}">
                                            <input type="hidden" name="price" value="{{$submenu->price}}">

                                            <button type="submit" class="btn btn-success">Submit</button>

                                        </form>

                                    </div>

                                    <div class="product-detail-extra-link">
                                        <a class="wishlist-link" href="#"><span class="lnr lnr-heart"></span>Wishlist</a>
                                        <a class="compare-link" href="#"><span class="lnr lnr-paw"></span>Compare</a>
                                        <div class="share-social-product">
                                            <a class="share-link" href="#"><span class="lnr lnr-bullhorn"></span>Share</a>
                                            <ul class="list-social-product">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tab-detail">
                <div class="title-tab-detail">
                    <ul role="tablist">
                        <li class="active"><a data-toggle="tab" href="#tab1">Product Description  </a></li>
                        <li><a data-toggle="tab" href="#tab2"> Additional Information </a></li>
                        {{--<li><a data-toggle="tab" href="#tab3">Additional information  </a></li>
                        <li><a data-toggle="tab" href="#tab4">Tags </a></li>
                        <li><a data-toggle="tab" href="#tab5">Custom Tab</a></li>--}}
                    </ul>
                </div>
                <div class="content-tab-detail">
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane active" role="tabpanel">
                            <div class="inner-tab-detail">
                                {{--<p>{!! $submenu->details !!}</p>--}}
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="zoom-image">
                                            <img alt="" src="{{URL::to('frontend/image/productsubmenu/'.$submenu->main)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12">

                                        <p>{!! $submenu->details !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane" role="tabpanel">
                            <div class="inner-tab-detail">

                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="zoom-image">
                                            <img alt="" src="{{URL::to('frontend/image/productsubmenu/'.$submenu->main)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12">

                                        <ul>
                                            <li><label>Product_menu:</label> <span>{{$submenu->Productmenu->menu}}</span></li>
                                            @if($submenu->available == 1)
                                                <li><label>Available:</label> <span>In Stock</span></li>
                                            @else
                                                <li><label>Available:</label> <span>Finished</span></li>
                                            @endif
                                                <li><label>Price:</label> <span>Rs.{{$submenu->price}}</span></li>
                                                <li><label>Product_code:</label> <span>{{$submenu->product_code}}</span></li>
                                                <li><label>Rating:</label> <span>{{$submenu->rating}}</span></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div id="tab3" class="tab-pane" role="tabpanel">
                            <div class="inner-tab-detail">
                                <p> I promise you, they don’t want you to jetski, they don’t want you to smile. I told you all this before, when you have a swimming pool, do not use chlorine, use salt water, the healing, salt water is the healing. You see the hedges, how I got it shaped up? It’s important to shape up your hedges, it’s like getting a haircutLorem Khaled Ipsum is a major key to success. Another one. The key is to enjoy life, because they don’t want you to enjoy life.</p>
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="zoom-image">
                                            <a href="#"><img alt="" src="images/detail/tab-thumb.png"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                        <ul>
                                            <li><a href="#">In life there will be road blocks but we will over come it.</a></li>
                                            <li><a href="#">Major key, don’t fall for the trap, stay focused.</a></li>
                                            <li><a href="#">It’s the Stay focused ones closest to you that want to see you fail.</a></li>
                                            <li><a href="#">Major key, don’t fall for the trap, stay focused.</a></li>
                                            <li><a href="#">It’s the ones closest to you that want to see you fail</a></li>
                                        </ul>
                                        <p>To succeed you must believe. When you believe, you will succeed. Put it this way, it took me twenty five years to get these plants, twenty five years of blood sweat and tears, and I’m never giving up</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab4" class="tab-pane" role="tabpanel">
                            <div class="inner-tab-detail">
                                <p>Lorem Khaled Ipsum is a major key to success. Another one. The key is to enjoy life, because they don’t want you to enjoy life. I promise you, they don’t want you to jetski, they don’t want you to smile. I told you all this before, when you have a swimming pool, do not use chlorine, use salt water, the healing, salt water is the healing. You see the hedges, how I got it shaped up? It’s important to shape up your hedges, it’s like getting a haircut</p>
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="zoom-image">
                                            <a href="#"><img alt="" src="images/detail/tab-thumb.png"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                        <p>To succeed you must believe. When you believe, you will succeed. Put it this way, it took me twenty five years to get these plants, twenty five years of blood sweat and tears, and I’m never giving up</p>
                                        <ul>
                                            <li><a href="#">In life there will be road blocks but we will over come it.</a></li>
                                            <li><a href="#">Major key, don’t fall for the trap, stay focused.</a></li>
                                            <li><a href="#">It’s the Stay focused ones closest to you that want to see you fail.</a></li>
                                            <li><a href="#">Major key, don’t fall for the trap, stay focused.</a></li>
                                            <li><a href="#">It’s the ones closest to you that want to see you fail</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <!-- End Tab Detail -->




            <div class="latest-product-detail">
                <h2>latest product</h2>
                <div class="wrap-item" data-itemscustom="[[0,1],[480,2],[768,3],[1024,4]]" data-navigation="true" data-pagination="false">


                  @foreach($latests as $latest)
                    <div class="item" style="height:400px;">
                        <div class="product-item">
                            <div class="product-thumb">
                                <a class="product-thumb-link" href="#">
                                    <img src="{{URL::to('frontend/image/productsubmenu/'.$latest->main)}}" style="height:200px;">
                                </a>
                                <div class="product-more-link">

                                    <form action="{{route('cart.add')}}"  method="POST">
                                        {{csrf_field()}}

                                        <input type="hidden" name="id" value="{{$latest->id}}">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="proname" value="{{$latest->name}}">
                                        <input type="hidden" name="price" value="{{$latest->price}}">

                                        <button type="submit" class="addcart-link" style="height:40px;width:40px;"><span class="lnr lnr-cart" style="height:30px;width:40px;"></span></button>

                                    </form>

                                   {{-- <a href="#" class="addcart-link"><span class="lnr lnr-cart"></span><span>Add to cart</span></a>--}}
                                    {{--<a href="#" class="wishlist-link"><span class="lnr lnr-heart"></span><span>Add to wishlist</span></a>
                                    <a href="#" class="compare-link"><span class="lnr lnr-paw"></span><span>Add to compare</span></a>--}}
                                    <a href="{{route('singleproductdetails',['slug'=>$latest->slug])}}" ><span class="lnr lnr-eye" style="height:30px;width:40px;"></span><span>Quick view</span></a>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title"><a href="{{route('singleproductdetails',['slug'=>$latest->slug])}}">{{$latest->name}}</a></h3>
                                <div class="product-price">
                                    <strong>Rs.{{$latest->price}}</strong>
                                    {{--<span>$409</span>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                      @endforeach




                </div>
            </div>

        </div>
    </div>




    @endsection