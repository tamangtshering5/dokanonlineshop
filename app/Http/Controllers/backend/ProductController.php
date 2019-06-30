<?php

namespace App\Http\Controllers\backend;

use App\Model\Productmenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $menus = Productmenu::Orderby('id','desc')->paginate(5);
        return view('backend.pages.product.menu',compact('menus'));
    }

    public function menuadd(Request $request)
    {

        $this->validate($request,[

            'menu' => 'required',
        ]);


        $datas = new Productmenu;
        $datas->menu = ucwords($request->menu);
        $datas->slug = $request->slug;
        $datas->save();
        return redirect()->back()->with('success','Menu added successfully!!!');

    }


    public function menuedit(Request $request)
    {

        $id = $request->id;
        $datas = Productmenu::find($id);
        $menus = Productmenu::Orderby('id','desc')->get()->except($id);
        if($datas){
            return view('backend.pages.product.menuedit',compact('datas','menus'));
        }
        else{
            return redirect()->back()->with('error','No menu Found!!!');
        }

    }

    public function menuupdate(Request $request)
    {

        $id = $request->id;
        $datas = Productmenu::find($id);

        if($datas){
            $datas->menu = ucwords($request->menu);
            $datas->slug = $request->slug;
            $datas->save();
            return redirect()->back()->with('success','Updated Successfully!!!');
        }
        else{
            return redirect()->back()->with('error','No menu Found!!!');
        }

    }


    public function delete(Request $request){
        $id = (int)$request->id;
        $datas = Productmenu::find($id);

        if($datas)
        {
            $datas->delete();
            return redirect()->back()->with('success','Deleted Successfully!!!');
        }
        else
        {
            return redirect()->back()->with('success','Deleted Successfully!!!');
        }



    }






}
