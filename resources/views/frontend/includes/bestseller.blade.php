<div class="bestsellers1">
    <div class="bestseller">
        <div class="container">
            <div>

                <div class="category-product">
                    <div class="new_title">
                        <h2>Best Sellers</h2>
                    </div>
                </div>

                <div class="product-bestseller row">
                    <div class="product-bestseller-content">
                        <div class="col-md-6 col-xs-12 hot-deal-box">
                            <div class="hot-deal">
                                <div class="item">
                                    @foreach($mainbest as $main)
                                    <div class="item-inner">
                                        <div class="item-img">
                                            <div class="item-img-info">
                                                <div class="link-quickview"><a href="#" class="quick-view"><i class="fa fa-eye"></i></a></div>
                                                <a class="product-image" title="Retis lapen casen" href="{{route('product_details',['slug'=>$main->slug])}}"> <img src="{{URL::to('backend/images/products/'.$main->image)}}"  alt=""> </a>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title"> <a title="Retis lapen casen" href="{{route('product_details',['slug'=>$main->slug])}}">{{$main->product_name}}</a> </div>
                                                
                                                <div {{--class="rating rateit-small"--}}>
                                @for($i=1;$i<=5;$i++)
                                    @if($main->rating>=$i)
                                        <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                    @endif
                                @endfor
                            </div>
                                                <div class="product-item-description">{!!$best_text->content!!}</div>
                                                <div class="item-content">
                                                    <div class="item-price">
                                                        <div class="price-box">
                                                            <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> Rs.{{$main->new_price}} </span> </p>
                                                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> Rs.{{$main->old_price}} </span> </p>
                                                        </div>
                                                        <br>
                                                        <a href="{{route('addcart',['slug'=>$main->slug])}}"><button class="btn btn-primary cart-btn" type="button">Add to cart</button></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 por-tabs">
                            <div class="product-bestseller-list">
                                <div class="tab-container">
                                    <!-- tab product -->
                                    <div class="tab-panel active" id="tab-1">
                                        <div class="category-products">
                                            <ul class="products-grid">
                                                @foreach($best as $bes)
                                                <li class="item col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item-inner">
                                                        <div class="item-img">
                                                            <a class="product-image" title="Retis lapen casen" href="{{route('product_details',['slug'=>$bes->slug])}}"> <img src="{{URL::to('backend/images/products/'.$bes->image)}}" alt=""> </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title"> <a title="Retis lapen casen" href="{{route('product_details',['slug'=>$bes->slug])}}">{{$bes->product_name}}</a> </div>
                                                                <div {{--class="rating rateit-small"--}}>
                                @for($i=1;$i<=5;$i++)
                                    @if($bes->rating>=$i)
                                        <span><i class="fa fa-star orange" style="color: #F1931B;"></i></span>
                                    @endif
                                @endfor
                            </div>
                                                                <div class="item-content">
                                                                    <div class="item-price">
                                                                        <div class="price-box">
                                                                            <p class="special-price"> <span class="price-label">Price</span> <span class="price"> Rs.{{$bes->new_price}} </span> </p>
                                                                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> Rs.{{$bes->old_price}} </span> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                    @endforeach


                                            </ul>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>