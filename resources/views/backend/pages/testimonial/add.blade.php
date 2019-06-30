@extends('backend.master')
@section('body')


    <div class="right_col" role="main">

        <div style="margin-top:65px;">
            @include('backend.includes.message')
        </div>


        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">

                    <div class="x_title">
                        <h2><i class="fa fa-tag"></i>&nbsp; What people say about us!! </h2>
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
                              action="{{route('admin-testimonial-add')}}" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="category">Name <span class="required">*</span> </label>
                                <div>


                                    <input type="text" name="name" required  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category">Image <span class="required">*</span> </label>
                                <div>


                                    <input type="file" name="image" required  class="form-control">
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



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>





            </div>



            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">

                    <div class="x_title">
                        <h2><i class="fa fa-tags"></i> View </h2>
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

                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th width="20%">Name</th>
                                <th width="20%">Image</th>
                                <th width="40%">Details</th>
                                <th width="5%">Action</th></tr>
                            </thead>
                            <tbody>



                               @foreach($test as $t)
                                <tr>

                                    <td>{{$t->name}}</td>
                                    <td><img src="{{URL::to('frontend/image/testimonial/'.$t->image)}}" class="img-circle" style="width:120px;height:100px;"></td>
                                    <td>{!! str_limit($t->details,200) !!}</td>
                                    <td>



                                        <form action="{{route('admin-testimonial-delete',['id'=>$t->id])}}" method="post">
                                            {{ csrf_field() }}

                                            <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash" style="font-size:15px;color:limegreen"></span></button>
                                        </form>

                                    </td>


                                </tr>
                                   @endforeach

                            </tbody>


                        </table>

                        <br>
                        <center>{{$test->links()}}</center>




                    </div>
                </div>

            </div>

        </div>
        </div>










    @endsection