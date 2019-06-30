@extends('backend.master')
@section('body')
    <div class="right_col" role="main">
        {{--<div style="margin-top:65px;">
            @include('backend.includes.message')
        </div>--}}
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error )
                            <p class=" alert-success">{{$error}}</p>

                        @endforeach
                    @endif

                    @if(session('success'))
                        <p class="alert alert-success">{{session('success')}}</p>

                    @endif
                    <div class="x_title">
                        <h2><i class="fa fa-tags"></i>About Edit</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col col-xs-6 text-left">
                                <a href="{{route('babout')}}" class="btn btn-sm btn-primary btn-create"><i class="fa fa-reply"></i>Back</a>

                            </div>

                        </div>

                        <div class="panel-body">
                            <div class="col-md-8">
                                <form class="form-horizontal form-label-left" method="post"
                                      action="{{route('aboutedit_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group col-lg-12">
                                        <label for="category">About Policy  </label>
                                        <div>
                                            <textarea class="form-control" id="detail" name="detail" >{!! $data->about !!}</textarea>
                                        </div>
                                    </div>
                                    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                    <script>
                                        CKEDITOR.replace( 'detail' );
                                    </script>
                                    <div class="ln_solid"></div>
                                    <div class="form-group ">
                                        <div>
                                            <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Update</button>
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
@endsection