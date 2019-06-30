<?php

namespace App\Http\Controllers\backend;

use App\Model\Productsubmenuimage;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Productsubmenu;
use App\Model\Productmenu;
class CartController extends Controller
{
    public function index()
    {
        return "hello";
    }

    public function add(Request $request)
    {

        $duplicates = Cart::search(function ($cartItem, $rowId)use($request) {
            return $cartItem->id === $request->id;
        });


        if($duplicates->isNotEmpty()){
            return redirect()->back()->with('error','Item is already in your Cart!!!');
        }

        $id = $request->id;
        $qty = $request->qty;
        $proname = $request->proname;
        $price = $request->price;

        Cart::instance('default')->add($id,$proname,$qty,$price)->associate('App\Model\Productsubmenu');
        return redirect()->back()->with('error',"Added to Cart!!!");


    }



    public function destroy(Request $request){


        $id = $request->id;
       $datas = Cart::instance('default')->remove($id);
        return redirect()->back()->with('error',"Item in Cart Deleted!!!");


    }



}
