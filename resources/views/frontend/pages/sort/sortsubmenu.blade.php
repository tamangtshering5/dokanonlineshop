{{--

--}}
{{--@extends('frontend.master1')
@section('body')--}}{{--


    <!-- ============================================== HEADER : END ============================================== -->

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="page-title"><h2>{{$catlink->category}}/{{$menulink->menu}}/{{$sub_id->title}}</h2></div>
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
                            <!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                --}}
{{--
                                                                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                                                --}}{{--

                                                <select class="form-control" name="sort" id="sort">

                                                    <option value="">Popularity</option>
                                                    <option value="">Price low to high</option>
                                                    <option value="">Price high to low</option>

                                                </select>

                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                                <script type="text/javascript">
                                                    $(document).ready(function(){

                                                        $("#sort").click(function(){
                                                                    /*var cat=$(this).val();*/
                                                                    /*alert(cat);*/
                                                                $.ajax({
                                                                    type:'get',
                                                                    dataType:'html',
                                                                    url:'{{URL::to('/sort-by-popularity')}}',
                                                                    /*data:'pcat_id='+cat,*/
                                                                    success:function(response){
                                                                        //console.log(response);
                                                                        $("#products").html(response);
                                                                    }
                                                                });
                                                            }
                                                        );


                                                    });
                                                </script>
                                                <div id="products">
                                                </div>
                                                --}}
{{--<ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">position</a></li>
                                                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                                </ul>--}}{{--

                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Show</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">1</a></li>
                                                    <li role="presentation"><a href="#">2</a></li>
                                                    <li role="presentation"><a href="#">3</a></li>
                                                    <li role="presentation"><a href="#">4</a></li>
                                                    <li role="presentation"><a href="#">5</a></li>
                                                    <li role="presentation"><a href="#">6</a></li>
                                                    <li role="presentation"><a href="#">7</a></li>
                                                    <li role="presentation"><a href="#">8</a></li>
                                                    <li role="presentation"><a href="#">9</a></li>
                                                    <li role="presentation"><a href="#">10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.col -->
                        --}}
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
                            <!-- /.pagination-container --> </div>--}}{{--

                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach(/*App\Model\Product::where('submenu_id','=',$sub_id->id)->paginate(1)*/ $subproducts as $subprod)
                                            <div class="col-sm-6 col-md-3 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="detail.php"><img src="{{URL::to('backend/images/products/'.$subprod->image)}}" alt=""></a> </div>
                                                            <!-- /.image -->


                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="detail.php">{!! $subprod->detail !!}</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price"> <span class="price"> Rs.{{$subprod->new_price}} </span> <span class="price-before-discount">Rs.{{$subprod->old_price}}</span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                    </li>
                                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.php" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                    <li> <a class="add-to-cart" href="detail.php" title="Compare"> </a> </li>
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
                                    @foreach(/*App\Model\Product::where('submenu_id','=',$sub_id->id)->get()*/ $subproducts as $subprod)

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
                                                                <h3 class="name"><a href="detail.php">{{$subprod->product_name}}</a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> <span class="price"> Rs.{{$subprod->new_price}} </span> <span class="price-before-discount">Rs.{{$subprod->old_price}}</span> </div>
                                                                <!-- /.product-price -->
                                                                <div class="description m-t-10">{!! $subprod->detail !!}</div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                            </li>
                                                                            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.php" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                            <li> <a class="add-to-cart" href="detail.php" title="Compare"> </a> </li>
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
                                --}}
{{-- <div class="pagination-container">--}}{{--

                                <div style="margin-left: 50%">
                                    {{$subproducts->links()}}
                                </div>

                            --}}
{{--<ul class="list-inline list-unstyled">
                                <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>--}}{{--

                            <!-- /.list-inline -->
                            --}}
{{--</div>--}}{{--

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
            <div class="container">
                <div class="row">
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive" src="{{URL::to('frontend/images/banners/home-banner1.jpg')}}" alt=""> </div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6 col-sm-6">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive" src="{{URL::to('frontend/images/banners/home-banner2.jpg')}}" alt=""> </div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.wide-banners -->
                </div>
                <!-- /.breadcrumb -->

            </div>
            <!-- /.container -->

        </div>
    </div>

    @include('frontend.includes.rated')


--}}
{{--@endsection--}}

<table class="table table-striped table-bordered table-list">
    <thead>
    <tr>
        <th class="hidden-xs">ID</th>
        <th class="hidden-xs">Image</th>
        <th class="hidden-xs">Product Name</th>
        <th class="hidden-xs">New Price</th>
        <th class="hidden-xs">Old Price</th>
        <th class="hidden-xs">Rating</th>
        <th class="hidden-xs">Availability</th>
        <th class="hidden-xs">Discount</th>
        <th class="hidden-xs">New</th>
        <th class="hidden-xs">Featured</th>
        <th class="hidden-xs">Special</th>
        <th><em class="fa fa-cog"></em></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $dat)
        <tr>
            <td class="hidden-xs">{{$loop->index+1}}</td>
            <td><img src="{{URL::to('backend/images/products/'.$dat->image)}}" alt="{{$dat->product_name}}" style="height:50px;width:50px;" /></td>
            <td>{{$dat->product_name}}</td>
            <td>{{$dat->new_price}}</td>
            <td>{{$dat->old_price}}</td>
            <td>{{$dat->rating}}</td>
            <td>{{$dat->availability}}</td>
            <td>{{$dat->discount}}</td>
            @if($dat->new==0)
                <td>no</td>
            @else
                <td>yes</td>
            @endif

            @if($dat->featured==0)
                <td>no</td>
            @else
                <td>yes</td>
            @endif

            @if($dat->special==0)
                <td>no</td>
            @else
                <td>yes</td>
            @endif


            <td align="center">
                <a class="btn btn-primary" title="edit" href="{{route('product_edit',['id'=>$dat->id])}}">
                    <i class="fa fa-edit"  ></i>
                </a>
                <form action="{{route('product_del',['id'=>$dat->id])}}" method="post">
                    {{csrf_field()}}
                    <button class="btn btn-danger" title="delete"><em class="fa fa-trash"></em></button>
                </form>
            </td>

        </tr>
    @endforeach
    </tbody>

</table>