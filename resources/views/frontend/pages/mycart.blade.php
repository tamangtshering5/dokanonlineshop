
<!-- ============================================== HEADER ============================================== -->
@extends('frontend.master1')
@section('body')

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs">
    <div class="container">
        <div>
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="cart-romove item">Remove</th>
                                <th class="cart-description item">Image</th>
                                <th class="cart-product-name item">Product Name</th>
                                <th class="cart-qty item">Quantity</th>
                                <th class="cart-total last-item">Total</th>
                            </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="shopping-cart-btn">
                            <span class="">
                                <a href="{{route('dashboard')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                @if(count(Cart::content())>0)
                                <a href="{{route('checkout')}}" class="btn btn-upper btn-primary pull-right outer-right-xs">PROCEED TO CHECKOUT</a>
                                @endif
                            </span>
                                    </div><!-- /.shopping-cart-btn -->
                                </td>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if(count(Cart::content())>0)
                                @foreach($cartitems as $cartitem)
                            <tr>
                                <td class="romove-item"><a href="{{route('cartremove',['id'=>$cartitem->rowId])}}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                                <td class="cart-image">
                                    <img src="{{URL::to('backend/images/products/'.$cartitem->options->image)}}" alt="">
                                </td>
                                <td class="cart-product-name-info">
                                    <h4 class='cart-product-description'>{{$cartitem->name}}</h4>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="quant-input">
                                        <div class="arrows">
                                            <input type="hidden" value="{{$cartitem->rowId}}" id="hidden{{$cartitem->id}}">
                                            <input type="number"  min="1" value="{{$cartitem->qty}}" class="qty{{$cartitem->id}}" >
                                        </div>
                                        {{--<input type="text" value="1">--}}
                                    </div>
                                </td>
                                <td class="cart-product-sub-total" id="price{{$cartitem->id}}" >{{--<span class="cart-sub-total-price" id="price{{$cartitem->id}}">--}}Rs.{{($cartitem->price)*($cartitem->qty)}}{{--</span>--}}</td>
                            </tr>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $(".qty{{$cartitem->id}}").on('change keyup', function(){
                                        var a =   $(".qty{{$cartitem->id}}").val();
                                        var b =   $("#hidden{{$cartitem->id}}").val();
                                        $.ajax({
                                            url : '{{URL::to('cart-update')}}',
                                            data: {'id': b,'qty':a},
                                            type : 'get',
                                            success : function(datas){
                                                /*console.log(datas);*/
                                                $("#price{{$cartitem->id}}").empty();
                                                $("#price{{$cartitem->id}}").append('<span id="price{{$cartitem->id}}">Rs.'+datas.subtotal+'</span>');
                                                /*$('#total').load(location.href + ' #total');*/
                                                /*$("#grandtotal").empty();
                                                 $("#grandtotal").append('<span id="grandtotal">'++'</span></td>');*/
                                            }
                                        });
                                    });
                                });
                            </script>
                                @endforeach
                                    @else
                                        <tr>
                                            <td colspan="100%" class="text-center">No products added to cart.</td>
                                        </tr>
                                    @endif

                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->
            </div><!-- /.shopping-cart -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    <section class="bottom-section">
        <div class="container">
            <div class="row">
@endsection







