<body>
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <strong style="line-height: 45px; font-size:12px;" class="text-danger">Welcome to Dokan Online Shopping </strong>
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{route('mycart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                         @if(count(Cart::content())>0)
                        <li><a href="{{route('checkout')}}"><i class="icon fa fa-check"></i>Checkout</a></li>
                        @endif
                    </ul>
                </div>
                <!-- /.cnt-account -->


                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    @foreach($logo as $log)
                    <div class="logo"> <a href="{{route('dashboard')}}"> <img src="{{URL::to('frontend/image/logo/'.$log->image)}}" alt="logo"> </a> </div>
                    @endforeach
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= --> </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        {{--<form>--}}

                                <form class="navbar-form" action="{{ route('search') }}">
                                    <div class="control-group">
                                        <ul class="categories-filter animate-dropdown">
                                            <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Categories <b class="caret"></b></a>
                                                <ul class="dropdown-menu" role="menu" >
                                                    @foreach($cata as $cat)
                                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('catasearch',['slug'=>$cat->slug])}}">- {{$cat->category}}</a></li>
                                                    @endforeach
                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    <input type="text" class="search-field" placeholder="Search here..." name="query"/>
                                    <button type="submit" class="search-button"></button></div>
                                </form>


                        {{--</form>--}}
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"></div>
                                <div class="basket-item-count"><span class="count">{{Cart::count()}}</span></div>
                                <div class="total-price-basket"> <span class="lbl"></span> <span class="total-price"></span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                @foreach($cartitems as $cartitem)
                                <div class="cart-item product-summary">
                                    <div class="row">

                                        <div class="col-xs-4">
                                            <div class="image"> <a href=""><img src="{{URL::to('backend/images/products/'.$cartitem->options->image)}}" alt=""></a> </div>
                                        </div>

                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index8a95.php?page-detail">{{$cartitem->name}}</a></h3>
                                            <div class="price">Rs.{{$cartitem->price}}</div>
                                        </div>
                                        
                                        <div class="col-xs-1 action"> <a href="{{route('cartremove',['id'=>$cartitem->rowId])}}"><i class="fa fa-trash"></i></a> </div>
                                
                                    </div>
                                </div>
                            @endforeach
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                @if(count(Cart::content())>0)
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>{{Cart::total()}}</span> </div>
                                    <div class="clearfix"></div>
                                    
                                    <a href="{{route('checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> 
                                    
                                    </div>
                                    @else
                                    <h5>no products added to cart</h5>
                                    @endif
                                <!-- /.cart-total-->


                            </li>

                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->
    @if(count($errors->all()))
        @foreach($errors->all() as $error)
            <center>
                <div class="alert alert-danger alert-dismissible" style="width:800px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                    <strong>{{$error}}</strong>
                </div>

            </center>
        @endforeach
    @endif




    @if(session('success'))
        <center>
            <div class="alert alert-success alert-dismissible" style="width:800px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                <strong>{{session('success')}}</strong>
            </div>

        </center>

    @endif





    @if(session('error'))
        <center>
            <div class="alert alert-danger alert-dismissible" style="width:800px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                <strong>{{session('error')}}</strong>
            </div>

        </center>
@endif
    <!-- ============================================== NAVBAR ============================================== -->
     <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="dropdown yamm-fw"> <a href="{{route('dashboard')}}">Home</a> </li>
                                @foreach($cata as $cat)
                                <li class="dropdown mega-menu">
                                    <a data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$cat->category}}</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    @foreach(\App\Model\Menu::where('category_id','=',$cat->id)->get() as $menu)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                                        <a href="{{route('submenupage',['slug'=>$menu->slug])}}"> <h2 class="title">{{$menu->menu}}</h2></a>

                                                
                                                    </div>
                                                    @endforeach
                                                    <!-- /.col -->


                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
@endforeach
                                <li class="dropdown  navbar-right special-menu"> <a href="{{route('latest_offer')}}"><button type="button" class="btn btn-primary btn-sm" style="margin-top:-5px; padding: 1.5px; width: 150px;">Latest Offers</button> <span class="menu-label hot-menu hidden-xs">Hurry Up!</span></a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>

</header>
