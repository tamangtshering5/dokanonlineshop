<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-shopping-bag"></i>&nbsp;Total Products</span>
            <div class="count">{{$total}}</div>
        </div>
        @foreach($populars as $popular)
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count2_top"><i class="fa fa-clock-o"></i>&nbsp;Most Popular Product</span>

                <div class="count"><img src="{{URL::to('Img/Uploads/Products/'.$popular->image)}}" style="width: 50px" alt=""> &nbsp;{{$popular->name}}</div>
                <span class="count_bottom"> {{$popular->views}} &nbsp; Views</span>
            </div>

        @endforeach
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>&nbsp;Total Customer Message</span>
            <div class="count">{{$contacts}}</div>
            <span class="count_bottom"> From last Month</span>
        </div>
    </div>
    <!-- /top tiles -->