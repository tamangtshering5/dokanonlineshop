<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <a href="{{route('home')}}">
                    <img src="{{URL::to('backend/userimg/'.Auth::user()->image)}}"  class="img-circle profile_img" style="height:110px;width:100px;">
                </a>
            </div>
            <div class="profile_info">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome,</span>
                <h2><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Auth::user()->name}}</strong></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br><br>
        <br><br>


        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <br>
                <br>
                <br>
                <ul class="nav side-menu">
                    <li><a href="{{route('home')}}"><i class="fa fa-gear"></i> Site_configuration </a>
                    </li>


                    <!--<li><a href="{{route('admin_testimonial')}}"><i class="fa fa-users"></i> Testimonial </a>
                    </li>-->
                    
                    <li><a href="{{route('babout')}}"><i class="fa fa-users"></i> About </a>
                    </li>

                    <li><a href="{{route('admin-slider')}}"><i class="fa fa-sliders"></i> Slider </a>
                    </li>

                    <li><a href="{{route('features')}}"><i class="fa fa-hdd-o"></i> Features </a>
                    </li>

                    <li><a><i class="fa fa-navicon"></i>Navigation<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin-category')}}">Add Category</a></li>
                            <li><a href="{{route('admin-menu')}}">Add Menu</a></li>
                           <!-- <li><a href="{{route('admin-submenu')}}">Add Sub-menu</a></li>-->
                        </ul>
                    </li>

                    <li><a href="{{route('products')}}"><i class="fa fa-cart-plus"></i>Add Products </a>
                    </li>

                    <li><a href="{{route('hotdeals')}}"><i class="fa fa-fire"></i> Hot Products </a>
                    </li>
                    
                    <li><a href="{{route('best_seller_text')}}"><i class="fa fa-fire"></i> Best seller text </a>
                    </li>

                    <li><a href="{{route('advertisement')}}"><i class="fa fa-desktop"></i> Advertisement </a>
                    </li>

                    <li><a href="{{route('terms')}}"><i class="fa fa-eye"></i> Terms & Conditions </a>
                    </li>

                    <li><a href="{{route('backfaq')}}"><i class="fa fa-question-circle"></i> FAQ </a>
                    </li>

                    <li><a href="{{route('brefund')}}"><i class="fa fa-money"></i> Refund Policy </a>
                    </li>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
       {{-- <div class="sidebar-footer hidden-small">
            <a href="" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="fa fa-wrench" aria-hidden="true"></span>
            </a>
            <a href="" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="fa fa-sign-out" aria-hidden="true"></span>
            </a>
        </div>--}}
        <!-- /menu footer buttons -->
    </div>
</div>
