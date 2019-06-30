<table class="table table-striped table-bordered table-list">
    <thead>
    <tr>
        <th class="hidden-xs">ID</th>
        <th class="hidden-xs">Image</th>
        <th class="hidden-xs">Product Name</th>
        <th class="hidden-xs">New Price</th>
        <th class="hidden-xs">Old Price</th>
        <th class="hidden-xs">Rating</th>
        <th class="hidden-xs">Availability</th>
        <th class="hidden-xs">Discount</th>
        <th class="hidden-xs">New</th>
        <th class="hidden-xs">Featured</th>
        <th class="hidden-xs">Special</th>
        <th class="hidden-xs">Offer</th>
        <th><em class="fa fa-cog"></em></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $dat)
        <tr>
            <td class="hidden-xs">{{$loop->index+1}}</td>
            <td><img src="{{URL::to('backend/images/products/'.$dat->image)}}" alt="{{$dat->product_name}}" style="height:50px;width:50px;" /></td>
            <td>{{$dat->product_name}}</td>
            <td>{{$dat->new_price}}</td>
            @if($dat->old_price != null)
            <td>gg{{$dat->old_price}}</td>
            @else
            <td>not available</td>
            @endif
            <td>{{$dat->rating}}</td>
            <td>{{$dat->availability}}</td>
            <td>{{$dat->discount}}</td>
            @if($dat->new==0)
                <td>no</td>
            @else
                <td>yes</td>
            @endif

            @if($dat->featured==0)
                <td>no</td>
            @else
                <td>yes</td>
            @endif

            @if($dat->special==0)
                <td>no</td>
            @else
                <td>yes</td>
            @endif

            @if($dat->offer==0)
                <td>no</td>
            @else
                <td>yes</td>
            @endif


            <td align="center">
                <a class="btn btn-primary" title="edit" href="{{route('product_edit',['id'=>$dat->id])}}">
                    <i class="fa fa-edit"  ></i>
                </a>
                <form action="{{route('product_del',['id'=>$dat->id])}}" method="post">
                    {{csrf_field()}}
                    <button class="btn btn-danger" title="delete"><em class="fa fa-trash"></em></button>
                </form>
            </td>

        </tr>
    @endforeach
    </tbody>

</table>