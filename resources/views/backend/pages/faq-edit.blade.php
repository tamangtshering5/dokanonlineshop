@extends('backend.master')
@section('body')

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
                                        <h3 class="panel-title">FAQ Edit</h3>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <a href="{{route('backfaq')}}" class="btn btn-sm btn-primary btn-create"><i class="fa fa-reply"></i>Back</a>

                                    </div>

                                </div>
                            </div>

                            <div class="panel-body">
                                <form class="form-horizontal form-label-left" method="post" id="tour_form"
                                      action="{{route('faqedit_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-group col-lg-12">
                                        <label for="category">Question <span class="required" style="color:red;">*</span> </label>
                                        <div>
                                            <input type="text" name="question" value="{{$data->question}}" required  class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12" id="dynamic_field">
                                        <label for="category">Answer <span class="required" style="color:red;">*</span> </label>
                                        <div>
                                            <textarea class="form-control" id="answer" name="ans" required>{!! $data->answer !!} </textarea>
                                        </div>
                                    </div>
                                    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                    <script>
                                        CKEDITOR.replace( 'answer' );
                                    </script>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div >
                                            <button type="submit" id="submit" class="btn btn-success pull-right" style="background: #1abb9c;border-color:#1abb9c;">Update</button>
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