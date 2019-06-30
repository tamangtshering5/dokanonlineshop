@if(count($errors->all()))
    @foreach($errors->all() as $error)
        <center>
            <div class="alert alert-danger alert-dismissible" style="width:800px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                <strong>{{$error}}</strong>
            </div>

        </center>
    @endforeach
@endif




@if(session('success'))
    <center>
        <div class="alert alert-success alert-dismissible" style="width:800px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
            <strong>{{session('success')}}</strong>
        </div>

    </center>

@endif





@if(session('error'))
    <center>
        <div class="alert alert-danger alert-dismissible" style="width:800px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
            <strong>{{session('error')}}</strong>
        </div>

    </center>
@endif