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






        <div class="col-md-12 col-sm-12 col-xs-12">



            <div class="x_panel">

                <div class="x_title">
                    <h2><i class="fa fa-tag"></i>&nbsp;Update Product </h2>

                    @include('backend.includes.message')


                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br>



                    <form class="form-horizontal form-label-left" method="post"
                          action="{{route('admin-product-submenu-update',['id'=>$datas->id])}}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="category">Product-Menu:  </label>
                            <div>

                                <select class="form-control" name="productmenu_id" required>

                                    <option value="{{$datas->Productmenu->id}}">{{$datas->Productmenu->menu}}</option>
                                    @foreach($menus as $menu)
                                        <option value="{{$menu->id}}">{{$menu->menu}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6 col-lg-6">
                                <label for="category">Name: </label>
                                <div>


                                    <input type="text" id="name" name="name" value="{{$datas->name}}"  class="form-control">
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


                                    <input type="text" id="slug" name="slug" value="{{$datas->slug}}" readonly  class="form-control">
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="category">Details:</label><br>
                            <div>
                                <textarea name="details" class="form-control" required id="one"  style="width:100px">

                                    {!! $datas->details !!}

                                </textarea>
                            </div>
                        </div>

                        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                        <script>
                            CKEDITOR.replace( 'one' );
                        </script>




                        <div class=" form-group col-md-6 col-sm-12">
                            <label>Rating:{{$datas->rating}}</label><br><br>
                            <div class="rating" >
                                <label>
                                    <input type="radio" name="rating" value="1" required  />
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
                                    <input type="radio" name="rating" value="4" required />
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




                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="category">Price(Rs):  </label>
                                <div>


                                    <input type="text"  name="price"  value="{{$datas->price}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <center>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </center>
                    </form>

                        <hr></hr>

                        <style>
                            div.gallery {
                                margin: 5px;
                                border: 1px solid #ccc;
                                float: left;
                                width: 180px;
                            }

                            div.gallery:hover {
                                border: 1px solid #777;
                            }

                            div.gallery img {
                                width: 100%;
                                height: auto;
                            }

                            div.desc {
                                padding: 15px;
                                text-align: center;
                            }
                        </style>





                        <div class="row col-md-12 col-xs-12">

                            <h3 style="color:black;">Add more image:</h3>
                            <br>
                            <form action="{{route('admin-product-submenuimage-add')}}" method="post" enctype="multipart/form-data">

                                {{csrf_field()}}

                                <span><input type="file" class="form-control" name="image[]" multiple style="width:300px;">
								<input type="hidden" value="{{$datas->id}}" name="id"></span><span style="margin-left:320px;">
								<button type="submit" class="btn btn-primary" style="margin-top:-50px;">Submit</button></span>

                            </form>

                            @foreach($datas->Productsubmenuimage as $x)

                                @if($x->type == 1)
                                    <div class="gallery ">

                                        <img src="{{URL::to('frontend/image/productsubmenu/'.$x->image)}}" style="width:177px; height:236px;">

                                        <div class="desc">

                                            <form action="{{route('admin-product-submenuimage-type',['id'=>$x->id])}}" method="post">
                                                {{csrf_field()}}

                                                <input type="hidden" value="{{$datas->id}}" name="productsubmenu_id">
                                                <input type="hidden" value="{{$x->image}}" name="image">

                                                <select style="color:black;background-color:palevioletred;" class="form-control" name="type" required>
                                                    <option value="1">Main</option>
                                                    <option value="0">Remove</option>
                                                </select><br>
                                                <button class="btn btn-primary">Submit</button>
                                            </form>

                                        </div>
                                    </div>

                                @else
                                    <div class="gallery ">

                                        <img src="{{URL::to('frontend/image/productsubmenu/'.$x->image)}}"  style="width:177px; height:200px;">

                                        <div class="desc">

                                            <form action="{{route('admin-product-submenuimage-type',['id'=>$x->id])}}" method="post">

                                                {{csrf_field()}}

                                                <input type="hidden" value="{{$x->image}}" name="image">
                                                <input type="hidden" value="{{$datas->id}}" name="productsubmenu_id">

                                                <select style="color:black;" class="form-control" name="type" required>
                                                    <option value="0">Choose</option>
                                                    <option value="1">Main-Pic</option>

                                                </select><br>
                                                <button class="btn btn-primary">Submit</button><br>
                                            </form>
                                            <form action="{{route('admin-product-submenuimage-delete',['id'=>$x->id])}}" method="post">
                                                {{csrf_field()}}


                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                @endif


                            @endforeach
                        </div>





                </div>
            </div>
        </div>







    </div>
@endsection