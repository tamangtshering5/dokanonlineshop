@extends('frontend.master1')
@section('body')

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Clothing</a></li>
                    <li class='active'>Floral Print Buttoned</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{URL::to('frontend/images/banners/LHS-banner.jpg')}}" alt="Image">
                        </div>



                        <!-- ============================================== HOT DEALS ============================================== -->
                        <div class=" hot-deals wow fadeInUp outer-top-vs">

                            <div class="owl-carousel sidebar-carousel owl-theme">
                                <div class="home-banner outer-top-n">
                                    <img src="{{URL::to('frontend/images/banners/detail-banner.jpg')}}">
                                </div>
                            </div><!-- /.sidebar-widget -->
                        </div>
                        <!-- ============================================== HOT DEALS: END ============================================== -->
                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="bzoom_wrap" style="height: 485px;">
                                    <ul id="bzoom">
                                        @foreach(App\HotdealImage::where('hotdeal_id','=',$hotdetail->id)->get() as $img)
                                            <li>
                                                <img class="bzoom_thumb_image" src="{{URL::to('backend/images/hotdeals/'.$img->images)}}" title="first img" />
                                                <img class="bzoom_big_image" src="{{URL::to('backend/images/hotdeals/'.$img->images)}}"/>
                                            </li>
                                        @endforeach
                                        {{--<li>
                                            <img class="bzoom_thumb_image" src="{{URL::to('frontend/images/zoom/2.png')}}" title="first img" />
                                            <img class="bzoom_big_image" src="{{URL::to('frontend/images/zoom/2.png')}}"/>
                                        </li>
                                        <li>
                                            <img class="bzoom_thumb_image" src="{{URL::to('frontend/images/zoom/3.jpg')}}" title="first img" />
                                            <img class="bzoom_big_image" src="{{URL::to('frontend/images/zoom/3.jpg')}}"/>
                                        </li>
                                        <li>
                                            <img class="bzoom_thumb_image" src="{{URL::to('frontend/images/zoom/4.jpg')}}" title="first img" />
                                            <img class="bzoom_big_image" src="{{URL::to('frontend/images/zoom/4.jpg')}}"/>
                                        </li>--}}
                                    </ul>
                                </div>
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{$hotdetail->product_name}}</h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div {{--class="rating rateit-small"--}}>
                                                    @for($i=1;$i<=5;$i++)
                                                        @if($hotdetail->rating>=$i)
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

                                                <h4><strong>Availability:</strong><small> {{$hotdetail->availability}}</small></h4>
                                                <h4><strong>Brand:</strong><small> {{$hotdetail->brand}}</small></h4>
                                                <h4><strong>Manufactured In:</strong><small> {{$hotdetail->manufactured}}</small></h4>
                                                <h4><strong>Delivery:</strong><small> {{$hotdetail->delivery}}</small></h4>



                                            </div>



                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->




                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    <span class="price">{{$hotdetail->new_price}}</span>
                                                    <span class="price-strike">{{$hotdetail->old_price}}</span>
                                                </div>
                                            </div>



                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-7">
                                                <a href="{{route('hotaddcart',['slug'=>$hotdetail->slug])}}" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
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
                                            <p class="text">{!! $hotdetail->detail !!}</p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                    </div>

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->

                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Price</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Value</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
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




