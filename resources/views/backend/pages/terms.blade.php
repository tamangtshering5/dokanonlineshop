@extends('backend.master')
@section('body')
    <div class="right_col" role="main">
        <div style="margin-top:65px;">
            @include('backend.includes.message')
        </div>
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_title">
                        <h2><i class="fa fa-tags"></i>Terms & Conditions</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="panel-body">
                            <div class="col-md-8">
                                <table class="table table-striped table-bordered table-list">
                                    <thead>
                                    <tr>
                                        <th class="hidden-xs">Terms & Conditions</th>
                                        <th><em class="fa fa-cog"></em></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)

                                        <tr>
                                            <td>{{$data->terms}}</td>
                                            <td algn="center">
                                                <a class="btn btn-primary" title="edit" href="{{route('terms_edit',['id'=>$data->id])}}">
                                                    <i class="fa fa-edit"  ></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection