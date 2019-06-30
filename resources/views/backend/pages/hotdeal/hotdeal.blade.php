@extends('backend.master')
@section('body')

    <style>
        .rating {
            display: inline-block;
            position: relative;
            height: 50px;
            line-height: 50px;
            font-size: 50px;
        }

        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .rating label:last-child {
            position: static;
        }

        .rating label:nth-child(1) {
            z-index: 5;
        }

        .rating label:nth-child(2) {
            z-index: 4;
        }

        .rating label:nth-child(3) {
            z-index: 3;
        }

        .rating label:nth-child(4) {
            z-index: 2;
        }

        .rating label:nth-child(5) {
            z-index: 1;
        }

        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .rating label .icon {
            float: left;
            color: transparent;
        }

        .rating label:last-child .icon {
            color: lightgrey;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
            color: #09f;
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #09f;
        }
    </style>

    <script>

        $(':radio').change(function() {
            console.log('New star rating: ' + this.value);
        });

    </script>

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1">
                <div class="x_panel">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error )
                            <p class=" alert-success">{{$error}}</p>

                        @endforeach
                    @endif

                    @if(session('success'))
                        <p class="alert alert-success">{{session('success')}}</p>

                    @endif
                    <div class="x_content">
                        <br>
                        <div class="panel panel-default panel-table">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col col-xs-6">
                                        <h3 class="panel-title">Hot Deals</h3>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i>Add here</button>

                                    </div>

                                </div>
                            </div>

                            <div class="panel-body">
                                @foreach($hotdeal as $hot)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="card-container">
                                            <div class="card">
                                                <div class="card-image">
                                                    <img src="{{URL::to('backend/images/products/'.$hot->image)}}" alt="{{$hot->image}}" {{--style="height:275px;width:100%;"--}}/>
                                                </div>
                                                <div class="card-info">
                                                    <div class="card-title">{{$hot->product_name}}</div>
                                                    <div class="card-detail">
                                                        <b>Detail:</b>{!! str_limit($hot->detail,200)  !!}
                                                        <b>Event Date:</b>{{$hot->eventdate}}<br>
                                                        <b>New Price:</b>{{$hot->new_price}}<br>
                                                        <b>Old Price:</b>{{$hot->old_price}}<br>
                                                        <b>Discount:</b>{{$hot->discount}}<br>
                                                        <b>Manufacture:</b>{{$hot->manufacture}}<br>
                                                        <b>Discount:</b>{{$hot->discount}}<br>
                                                        <b>Rating:</b>{{$hot->rating}}<br>
                                                        <b>Brand:</b>{{$hot->brand}}<br>
                                                        <b>Delivery:</b>{{$hot->delivery}}<br>
                                                        {{--@if($new->status==1)
                                                            <b>Status:</b>enable
                                                        @else
                                                            <b>Status:</b>disable
                                                        @endif--}}
                                                    </div>
                                                </div>
                                                <div class="card-social">
                                                    <ul>
                                                        <li><a href="{{route('hotdeal_edit',['id'=>$hot->id])}}"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                                                        </li>

                                                        <form method="post" action="{{route('hotdeal_del',['id'=>$hot->id])}}">
                                                            <li>
                                                                {{csrf_field()}}
                                                                <button type="submit" class="btn btn-link" title="delete" style="color: white;font-size: 20px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                            </li>
                                                        </form>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Packages</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" method="post"
                                              action="{{route('hotdeal_action')}}" enctype="multipart/form-data">

                                            {{csrf_field()}}

                                            <div class="form-group col-lg-12">
                                                <label for="category">Product Name <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="name" id="name" value="" required class="form-control">
                                                </div>
                                            </div>

                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                            <script>
                                                $(document).ready(function(){

                                                    $("input#name").keyup(function(e){
                                                        var val = $(this).val();
                                                        val = val.replace(/[^\w]+/g, "-");
                                                        $("input#slug").val(val);
                                                    });

                                                });
                                            </script>

                                            <div class="form-group col-md-6 col-sm-6 col-lg-6">
                                                <label for="category">Slug:  </label>
                                                <div>
                                                    <input type="text" id="slug" name="slug" readonly  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="category">Image <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="file" name="image" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="category">Scroll-Image <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="file" name="scroll_image[]"  required  class="form-control" multiple>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Event Date <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="datetime-local" name="eventdate"  value="" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Old Price <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="old_price"  value="" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">New Price <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="new_price"  value="" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Brand <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="brand"  value="" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Manufactured <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="manufacture"  value="" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Delivery <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="delivery"  value="" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Rating <span class="required" style="color:red;">*</span> </label><br><br>
                                                <div class="rating">
                                                    <label>
                                                        <input type="radio" name="rating" value="1" required />
                                                        <span class="icon">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rating" value="2" required />
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rating" value="3" required />
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rating" value="4"  required/>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rating" value="5" required />
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category"> Availability <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <select class="form-control" name="availability">
                                                        <option value="In Stock">In-Stock</option>
                                                        <option value="Not-Available">Not-Available</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Discount(*if available) <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="discount"  value=""  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Detail <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <textarea class="form-control" id="detail" name="detail" ></textarea>
                                                </div>
                                            </div>
                                            <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                            <script>
                                                CKEDITOR.replace( 'detail' );
                                            </script>
                                            <div class="ln_solid"></div>
                                            <div class="form-group ">
                                                <div>
                                                    <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection