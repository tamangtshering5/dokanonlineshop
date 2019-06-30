<?php

namespace App\Http\Controllers\backend;

use App\Model\Productmenu;
use App\Model\Productsubmenu;
use App\Model\Productsubmenuimage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsubController extends Controller
{
    public function index()
    {
        $menus = Productmenu::Orderby('id','desc')->get();
        return view('backend.pages.subproduct.submenu',compact('menus'));
    }


    public function submenuadd(Request $request)
    {

        $this->validate($request,[

            'productmenu_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'details' => 'required',
            'rating' => 'required',
        ]);

        $datas = new Productsubmenu;
        $datas->name = ucwords($request->name);
        $datas->slug = $request->slug;
        $datas->product_code = $request->product_code;
        $datas->price = $request->price;
        $datas->details = $request->details;
        $datas->rating = $request->rating;
        $datas->productmenu_id = $request->productmenu_id;
        $datas->save();

        $productsubmenu_id = $datas->id;

        if ($request->hasFile('image')) {

            foreach ($request->image as $file) {

                $filename = $file->getClientOriginalName().time();
                $file -> move(public_path().'/frontend/image/productsubmenu/',$filename);
                $datas = new Productsubmenuimage;
                $datas->image = $filename;
                $datas->productsubmenu_id = $productsubmenu_id;
                $datas->save();

            }
        }


        return redirect()->back()->with('success','Product added successfully!!!');

    }


    public function submenuupdate(Request $request)
    {

        $this->validate($request,[

            'productmenu_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'details' => 'required',

        ]);

        $p_id = $request->productmenu_id;
        $id = $request->id;
        if($p_id)
        {
            $datas = Productsubmenu::find($id);
            $datas->name = ucwords($request->name);
            $datas->slug = $request->slug;
            $datas->price = $request->price;
            $datas->product_code = $request->product_code;
            $datas->details = $request->details;
            $datas->rating = $request->rating;
            $datas->productmenu_id = $request->productmenu_id;
            $datas->save();
        }
        return redirect()->back()->with('success','Product updated successfully!!!');


    }


    public function submenuview()
    {
        $menus = Productmenu::Orderby('id','desc')->get();
        $submenus = Productsubmenu::Orderby('id','desc')->paginate(8);
        return view('backend.pages.subproduct.submenuview',compact('menus','submenus'));
    }

    public function submenusearch(Request $request)
    {
        $id = $request->productmenu_id;
        if($id == 0)
        {
            $menus = Productmenu::Orderby('id','desc')->get();
            $submenus = Productsubmenu::Orderby('id','desc')->paginate(8);
            return view('backend.pages.subproduct.submenuview',compact('menus','submenus'));
        }
        else
            {
                $menus = Productmenu::Orderby('id','desc')->get();
                $submenus = Productsubmenu::where('productmenu_id',$id)->paginate(8);
                return view('backend.pages.subproduct.submenuview',compact('menus','submenus'));
            }

    }


    public function submenuedit(Request $request)
    {

        $id = $request->id;
        $datas = Productsubmenu::find($id);
        $id = $datas->productmenu_id;
        $menus = Productmenu::Orderby('id','desc')->get()->except($id);


        if($datas){
            return view('backend.pages.subproduct.submenuedit',compact('datas','menus','imgs'));
        }
        else{
            return redirect()->back()->with('error','No Data Found!!!');
        }

    }




    public function submenudelete(Request $request){
        $id = (int)$request->id;
        $datas = Productsubmenu::find($id);

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


    public function submenuimagedelete(Request $request){
        $id = (int)$request->id;
        $datas = Productsubmenuimage::find($id);

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

    public function submenuimagetype(Request $request){

        $id = (int)$request->id;
        $img = $request->image;
        $p_id = (int)$request->productsubmenu_id;
        $datas = Productsubmenuimage::find($id);

        if($datas)
        {
             if($request->type == 1)
             {
                 $check = Productsubmenuimage::where('productsubmenu_id',$p_id)->where('type',1)->first();
                 if($check)
                 {

                     return redirect()->back()->with('error','Main image has been already registered!!!');
                 }
                 else
                 {
                     $datas->type = $request->type;
                     $datas->save();
                     $productsubmenu = Productsubmenu::find($p_id);
                     $productsubmenu->main = $img;
                     $productsubmenu->save();
                     return redirect()->back()->with('success','Updated successfully!!!');
                 }

             }
             else
                 {
                     $datas->type = $request->type;
                     $datas->save();
                     return redirect()->back()->with('success','Updated successfully!!!');
                 }



        }
        else
            {
                return redirect()->back()->with('error','something went wrong!!!');
            }


        }
		
		
    public function submenuimageadd(Request $request){

        $productsubmenu_id = $request->id;
		
		if($productsubmenu_id)
		{
		if ($request->hasFile('image')) {

            foreach ($request->image as $file) {

                $filename = $file->getClientOriginalName().time();
                $file -> move(public_path().'/frontend/image/productsubmenu/',$filename);
                $datas = new Productsubmenuimage;
                $datas->image = $filename;
                $datas->productsubmenu_id = $productsubmenu_id;
                $datas->save();

            }
        }

            return redirect()->back()->with('success','Image added successfully!!!');
		}
		else
		{
			 return redirect()->back()->with('error','Something went wrong!!!');
		}

        

    }




}
