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
                    <h2><i class="fa fa-tag"></i>&nbsp; Add Product </h2> &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{route('admin-submenu-view')}}"><button class="btn btn-primary">View-Products</button></a>

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
                          action="{{route('admin-submenu-add')}}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="category">Category:  </label>
                            <div>

                                <select class="form-control" name="category_id" id="category" required>

                                    <option value="">Choose</option>
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                           <script type="text/javascript">

                               $(document).ready(function(){

                                   $(document).on('change','#category',function(){

                                       var a = $(this).val();

                                       $.ajax({

                                           type:'get',
                                           url: '{{URL::to('Dashboard/Menu_choose')}}',
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


                        <div class="form-group col-md-6 col-xs-12">
                            <label for="category">Menu:  </label>
                            <div>

                               <select class="form-control" name="menu_id" id="menu" >

                                    <option value="0">Choose</option>

                                </select>

                            </div>
                        </div>
                        </div>



                        <div class="row">
                            <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                <label for="category">Title: </label>
                                <div>


                                    <input type="text" id="name" name="title" required  class="form-control">
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

                            <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                <label for="category">Slug:  </label>
                                <div>


                                    <input type="text" id="slug" name="slug" readonly  class="form-control">
                                </div>
                            </div>


                            <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                <label for="category">Availability:  </label>
                                <div>
                                    <select name="availability" class="form-control">
                                        <option value="In Stock">In-Stock</option>
                                        <option value="Not-Available">Not-Available</option>
                                    </select>

                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="category">Details:</label><br>
                            <div>
                                <textarea name="details" class="form-control" required id="one"  style="width:100px"></textarea>
                            </div>
                        </div>

                        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                        <script>
                            CKEDITOR.replace( 'one' );
                        </script>




                        <div class=" form-group col-md-6 col-sm-12">
                            <label>Rating:</label><br><br>
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




                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="category">Price(Rs):  </label>
                                <div>


                                    <input type="text"  name="price"  required class="form-control">
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="category">Image: </label>
                                <div>


                                    <input type="file" name="image[]" required multiple class="form-control">
                                </div>
                            </div>
                        </div>




                        <div class="ln_solid"></div>
                        <center>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>







    </div>
@endsection