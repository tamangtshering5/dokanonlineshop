
{{--//////////////////////////////--}}
{{--//////////////////////////////--}}
{{--//////////////////////////////--}}

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
                                        <h3 class="panel-title">Products</h3>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <a href="{{route('products')}}" class="btn btn-sm btn-primary btn-create"><i class="fa fa-reply"></i>Back</a>

                                    </div>

                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#edit" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit Adventure</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#slider" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Detail Images</a>
                                        </li>

                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="edit" aria-labelledby="home-tab">
                                            <form class="form-horizontal form-label-left" method="post"
                                                  action="{{route('productedit_action',['id'=>$data->id])}}" enctype="multipart/form-data">

                                                {{csrf_field()}}

                                                <div class="form-group col-lg-6" >
                                                    <label for="select-from">Select Catagory:</label>
                                                    <select class="form-control" required id="cata" name="category">
                                                        @foreach($cata as $cat)
                                                            <option value="{{$cat->id}}" {{($cat->category===$cats->category) ? 'selected' : ''}}>{{$cat->category}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                                <script type="text/javascript">

                                                    $(document).ready(function(){

                                                        $(document).on('change','#cata',function(){
                                                            var a = $(this).val();
                                                            $.ajax({
                                                                type:'get',
                                                                url: '{{URL::to('Dashboard/subcatagory-select')}}',
                                                                data:{'id':a},
                                                                success:function(datas){

                                                                    $("select#menu").empty();
                                                                    $.each(datas,function(i,data){

                                                                        $("select#menu").append('<option value="'+data.id+'"> '+data.menu+'</option>');

                                                                    });
                                                                }
                                                            });

                                                        });
                                                    });

                                                </script>

                                                <div class="form-group col-lg-6">
                                                    <label for="select-from">Select Sub-Catagory:</label>
                                                    <select class="form-control" required name="menu_id" id="menu">
                                                        @if($data->menu_id != null)
                                                        <option value="{{$menu->id}}">{{$menu->menu}}</option>
                                                            @else
                                                            <option value="">Choose</option>
                                                            @endif
                                                    </select>
                                                </div>
                                                
                                                <!--////////////changed later//////////-->

                                                <!--<script type="text/javascript">

                                                    $(document).ready(function(){

                                                        $(document).on('change','#menu',function(){
                                                            var a = $(this).val();
                                                            $.ajax({
                                                                type:'get',
                                                                url: '{{URL::to('Dashboard/childcatagory-select')}}',
                                                                data:{'id':a},
                                                                success:function(datas){

                                                                    $("select#submenu").empty();
                                                                    $.each(datas,function(i,data){

                                                                        $("select#submenu").append('<option value="'+data.id+'"> '+data.title+'</option>');

                                                                    });
                                                                }
                                                            });

                                                        });
                                                    });

                                                </script>


                                                <div class="form-group col-lg-12">
                                                    <label for="select-from">Select Child-Catagory:</label>
                                                    <select class="form-control" id="submenu" name="submenu_id">
                                                        @if($data->submenu_id != null)
                                                        <option value="{{$submenu->id}}">{{$submenu->title}}</option>
                                                            @else
                                                            <option value="">Choose</option>
                                                            @endif
                                                    </select>
                                                </div>-->

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Product Name  </label>
                                                    <div>
                                                        <input type="text" name="name" id="name" value="{{$data->product_name}}" class="form-control">
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
                                                        <input type="text" id="slug" name="slug" readonly value="{{$data->slug}}"  class="form-control">
                                                    </div>
                                                    <div class="jumbotron">
                                                        <img src="{{URL::to('backend/images/products/'.$data->image)}}" alt="{{$data->image}}" style="height:150px;width:150px;margin-left: 20%;">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="category">Image  </label>
                                                    <div>
                                                        <input type="file" name="image"  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Old Price  </label>
                                                    <div>
                                                        <input type="text" name="old_price"  value="{{$data->old_price}}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">New Price  </label>
                                                    <div>
                                                        <input type="text" name="new_price"  value="{{$data->new_price}}"  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Brand  </label>
                                                    <div>
                                                        <input type="text" name="brand"  value="{{$data->brand}}"  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Manufactured  </label>
                                                    <div>
                                                        <input type="text" name="manufacture"  value="{{$data->manufactured}}"  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Delivery  </label>
                                                    <div>
                                                        <input type="text" name="delivery"  value="{{$data->delivery}}"  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Rating  </label>
                                                    <div>
                                                        <input type="text" readonly value="{{$data->rating}}" name="rating" class="form-control">
                                                    </div><br><br>
                                                    <div class="rating">
                                                        <label>
                                                            <input type="radio" name="rating" value="1"  />
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="2"  />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="3"  />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="4"  />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="5"  />
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category"> Availability  </label>
                                                    <div>
                                                        <select class="form-control" name="availability">
                                                            @if($data->availability=='In Stock')
                                                                <option value="In Stock">In-Stock</option>
                                                                <option value="Not-Available">Not-Available</option>
                                                            @else
                                                                <option value="Not-Available">Not-Available</option>
                                                                <option value="In Stock">In-Stock</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Discount(*if available)  </label>
                                                    <div>
                                                        <input type="text" name="discount"  value="{{$data->discount}}"  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12" >
                                                    <label for="select-from">New:</label>

                                                    <select class="form-control" id="new" name="new">

                                                        <option value="1" @if($data->new=='1') selected @endif>enable </option>
                                                        <option value="0"@if($data->new=='0') selected @endif >disable </option>

                                                    </select>

                                                </div>

                                                <div class="form-group col-lg-12" >
                                                    <label for="select-from">Featured:</label>

                                                    <select class="form-control" id="featured" name="featured">

                                                        <option value="1" @if($data->featured=='1') selected @endif>enable </option>
                                                        <option value="0"@if($data->featured=='0') selected @endif >disable </option>

                                                    </select>

                                                </div>

                                                <div class="form-group col-lg-12" >
                                                    <label for="select-from">Special:</label>

                                                    <select class="form-control" id="special" name="special">

                                                        <option value="1" @if($data->special=='1') selected @endif>enable </option>
                                                        <option value="0"@if($data->special=='0') selected @endif >disable </option>

                                                    </select>

                                                </div>

                                                <div class="form-group col-lg-12" >
                                                    <label for="select-from">Offer:</label>

                                                    <select class="form-control" id="offer" name="offer">

                                                        <option value="1" @if($data->offer=='1') selected @endif>enable </option>
                                                        <option value="0"@if($data->offer=='0') selected @endif >disable </option>

                                                    </select>

                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Detail  </label>
                                                    <div>
                                                        <textarea class="form-control" id="detail" name="detail" >{!! $data->detail !!}</textarea>
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
                                        <div role="tabpanel" class="tab-pane fade" id="slider" aria-labelledby="profile-tab">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <form method="post" action="{{route('detailimage_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-group col-lg-6">
                                                        <label for="category">Add More Detail-Images <span class="required" style="color:red;">*</span> </label>
                                                        <div>
                                                            <input type="file" name="scroll_image[]"  required  class="form-control" multiple>
                                                        </div>
                                                    </div></br>

                                                    <span style="float: left;margin-top: 5px;">
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                        </span>
                                                </form>
                                                <br>
                                            </div>
                                            @foreach(App\DetailImage::where('Product_id','=',$data->id)->get() as $detail)


                                                <div class="col-md-3 col-sm-3 col-xs-3">

                                                    <form method="post" action="{{route('detailimage_del',['id'=>$detail->id])}}">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-danger" title="delete"><i class="fa fa-trash m-right-xs"></i></button>
                                                        <br><img src="{{URL::to('backend/images/products/'.$detail->images)}}" style="height:80px;width:120px;" alt="image">
                                                    </form>
                                                    <br>

                                                    <form method="post" action="{{route('setmainimage',['id'=>$detail->Product_id,'img'=>$detail->images])}}">
                                                        {{csrf_field()}}
                                                        <span style="float: left">
                                                            <button type="submit" class="btn btn-success" title="set as main image">Set as main image</button>
                                                        </span>
                                                    </form>

                                                </div>
                                            @endforeach

                                        </div>

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