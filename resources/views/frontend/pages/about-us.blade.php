@extends('frontend.master1')
@section('body')





<div class="container" style="margin-top: 10px;">

    <!-- Introduction Row -->
    @foreach($abouts as $about)
                       <p>
                           {!! $about->about !!}
                       </p>
                        @endforeach
    <hr>
    <!-- Team Members Row -->
    <!--<div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Our Team</h2>
            <br>
        </div>

@foreach($testimonial as $testi)
        <div class="col-lg-4 col-sm-6 text-center">
            <center> <img src="{{URL::to('backend/images/testimonial/'.$testi->image)}}" class="img img-responsive img-circle" ></center>
            <h3 class="text-center">{{$testi->name}}
                <small>{{$testi->designation}}</small>
            </h3>

            <p>{!! $testi->detail !!}</p>
        </div>
        @endforeach

    </div>
</div>-->

<br>
<hr>

<section id="services" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Our Features</h2>
                <br>


            </div>
        </div>
        <div class="row text-center">
            @foreach($features as $feature)
            <div class="col-md-4">
                @if($feature->mark == 1)
                <i class="fa fa-clock-o" style="font-size:65px; background: #ffc0c0;border-radius: 50%;padding: 25px;"></i>
                @elseif($feature->mark == 2)
                        <i class="fa fa-truck" style="font-size:65px; background: #ffc0c0;border-radius: 50%;padding: 25px;"></i>
                    @else
                    <i class="fa fa-money" style="font-size:65px; background: #ffc0c0;border-radius: 50%;padding: 25px;"></i>
                    @endif

                <h3 class="service-heading">{{$feature->title}}</h3>
                <p class="text-muted">{!! $feature->detail !!}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
</div>







       @endsection
