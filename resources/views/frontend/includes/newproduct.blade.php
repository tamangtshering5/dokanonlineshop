

{{--//////////////new product started///////////--}}
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
        <h3 class="new-product-title pull-left">New Products</h3>
        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

            @foreach($category as $cat)
            <li><a data-transition-type="backSlide" href="#{{$cat->slug}}" data-toggle="tab">{{$cat->category}}</a></li>
            @endforeach
            {{--<li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>--}}
            {{--<li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li>--}}
        </ul>
        <!-- /.nav-tabs -->
    </div>
    <div class="tab-content">

        <div class="tab-pane in active" id="{{$a1->slug}}">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    @foreach(App\Model\Product::where('category_id','=',$a1->id)->get() as $product)
                        @if($product->new==1)
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a href="{{route('product_details',['slug'=>$product->slug])}}"><img src="{{URL::to('backend/images/products/'.$product->image)}}" alt=""></a> </div>
                                    <!-- /.image -->
                                    <div class="tag new"><span>new</span></div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{route('product_details',['slug'=>$product->slug])}}">{{$product->product_name}}</a></h3>
                                    <div {{--class="rating rateit-small"--}}>
                                        @for($i=1;$i<=5;$i++)
                                            @if($product->rating>=$i)
                                                <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="description"></div>
                                    <div class="product-price"> <span class="price"> Rs.{{$product->new_price}} </span> <span class="price-before-discount">Rs.{{$product->old_price}}</span> </div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">

                                            <li class="add-cart-button btn-group" style="margin-left: -10px;">
                                                <a href="{{route('addcart',['slug'=>$product->slug])}}"> <button class="btn btn-primary icon" type="button"> Add to cart <i class="fa fa-shopping-cart"></i> </button>
{{--
                                                <button class="btn btn-primary cart-btn" type="button"><a href="">Add to cart</a></button>
--}}
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
                        @endif
                    <!-- /.item -->
                        @endforeach
                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="{{$a2->slug}}">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    @foreach(App\Model\Product::where('category_id','=',$a2->id)->get() as $product)
                        @if($product->new == 1)
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a href="{{route('product_details',['slug'=>$product->slug])}}"><img src="{{URL::to('backend/images/products/'.$product->image)}}" alt=""></a> </div>
                                    <!-- /.image -->

                                    <div class="tag new"><span>new</span></div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{route('product_details')}}">{{$product->product_name}}</a></h3>
                                    <div {{--class="rating rateit-small"--}}>
                                        @for($i=1;$i<=5;$i++)
                                            @if($product->rating>=$i)
                                                <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="description"></div>
                                    <div class="product-price"> <span class="price"> Rs.{{$product->new_price}} </span> <span class="price-before-discount">Rs.{{$product->old_price}}</span> </div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group" style="margin-left: -10px;">
                                                <a href="{{route('addcart',['slug'=>$product->slug])}}"> <button class="btn btn-primary icon" type="button"> Add to cart <i class="fa fa-shopping-cart"></i> </button></a>
                                                {{--
                                                                                                <button class="btn btn-primary cart-btn" type="button"><a href="">Add to cart</a></button>
                                                --}}
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
                        @endif
                    @endforeach
                    <!-- /.item -->

                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="{{$a3->slug}}">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    @foreach(App\Model\Product::where('category_id','=',$a3->id)->get() as $product)
                        @if($product->new == 1)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{route('product_details',['slug'=>$product->slug])}}"><img src="{{URL::to('backend/images/products/'.$product->image)}}" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{route('product_details',['slug'=>$product->slug])}}">{{$product->product_name}}</a></h3>
                                            <div {{--class="rating rateit-small"--}}>
                                                @for($i=1;$i<=5;$i++)
                                                    @if($product->rating>=$i)
                                                        <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                                    @endif
                                                @endfor
                                            </div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> Rs.{{$product->new_price}} </span> <span class="price-before-discount">Rs.{{$product->old_price}}</span> </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group" style="margin-left: -10px;">
                                                        <a href="{{route('addcart',['slug'=>$product->slug])}}"> <button class="btn btn-primary icon" type="button"> Add to cart <i class="fa fa-shopping-cart"></i> </button></a>
                                                        {{--
                                                                                                        <button class="btn btn-primary cart-btn" type="button"><a href="">Add to cart</a></button>
                                                        --}}
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
                    @endif
                @endforeach
                <!-- /.item -->

                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>



    </div>
    <!-- /.tab-content -->
</div>
<!-- /.scroll-tabs -->
<!-- ============================================== SCROLL TABS : END ============================================== -->
</div>
