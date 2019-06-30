<div class="container">
    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">Featured products</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            @foreach($products as $product)
                @if($product->featured==1)
            <div class="item item-carousel">
                <div class="products">
                    <div class="product">
                        <div class="product-image">
                            <div class="image"> <a href="{{route('product_details',['slug'=>$product->slug])}}"><img src="{{URL::to('backend/images/products/'.$product->image)}}" alt="" style="height: 170px;"></a> </div>
                            <!-- /.image -->
                            <div class="tag sale"><span>Best</span></div>

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
                                        <a href="{{route('addcart',['slug'=>$product->slug])}}"><button class="btn btn-primary icon" type="button">Add to cart <i class="fa fa-shopping-cart"></i> </button></a>                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
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
    </section>
    <!-- /.section -->
</div>
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
</div>
</div>