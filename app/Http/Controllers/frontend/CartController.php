<?php

namespace App\Http\Controllers\frontend;

use App\HotDeal;
use App\Model\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addcart(Request $request){

        $slug=$request->slug;
        $data=Product::where('slug',$slug)->first();
        Cart::add(['id'=>$data->id,'name'=>$data->product_name,'qty'=>1,'price'=>$data->new_price,'options'=>['image' => $data->image,'flag'=>$data->flag]]);
//        dd($cart);
        return redirect()->back()->with('success','Added to Cart');
    }

    public function hotaddcart(Request $request){
        $duplicates = Cart::search(function ($cartItem, $rowId)use($request) {
            return $cartItem->id === $request->id;
        });


        if($duplicates->isNotEmpty()){
            return redirect()->back()->with('error','Item is already in your Cart!!!');
        }
        $slug=$request->slug;
        $data=HotDeal::where('slug',$slug)->first();
        /*$cart=*/Cart::add(['id'=>$data->id,'name'=>$data->product_name,'qty'=>1,'price'=>$data->new_price,'options'=>['image' => $data->image,'flag'=>$data->flag]]);
        /*dd($cart);*/
        return redirect()->back()->with('success','Added to Cart');
    }

    public function cartremove(Request $request){
        $id=$request->id;
        Cart::remove($id);
        return redirect()->back()->with('success','Removed successfully !!');
    }

    public function update(Request $request){

        $qty = $request->qty;
        /*dd($qty);*/
        $row = $request->id;
        $data = Cart::update($row, $qty);


        return response()->json($data);
    }


}
