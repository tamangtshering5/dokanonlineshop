<?php

namespace App\Http\Controllers\backend;

use App\DetailImage;
use App\Model\Category;
use App\Model\Menu;
use App\Model\Product;
use App\Model\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class productsController extends Controller
{
    public function index(){
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        return view('backend.pages.products.products',compact('cata','menu','submenu'));
    }

    public function subcatagory_select(Request $request){
        $id=(int)$request->id;
        $datas=Menu::where('category_id',$id)->get();
        return response()->json($datas);
    }

    public function childcatagory_select(Request $request){
        $id=(int)$request->id;
        $datas=Submenu::where('menu_id',$id)->get();
        return response()->json($datas);
    }

    public function products_find(Request $request){
        $id=(int)$request->pcat_id;
        $datas=Product::where('menu_id',$id)->get();
        return view('backend.pages.product-display.subproducts_display',[
            'data'=>$datas,'CatByUser'=>'All Products'
        ]);
    }

    public function cproducts_find(Request $request){
        $id=(int)$request->pcat_id;
        $datas=Product::where('submenu_id',$id)->get();
        return view('backend.pages.product-display.childproducts_display',[
            'data'=>$datas,'CatByUser'=>'All Products'
        ]);
    }

    public function products_action(Request $request){
        
        $this->validate($request,['name'=>'required',
        'image'=>'required',
        'new_price'=>'required',
        'rating'=>'required',
        'detail'=>'required']);
        $datas=new Product;
        $datas->category_id=$request->category;
        $datas->menu_id=$request->menu_id;

        /*$datas->submenu_id=$request->submenu_id;*/
        $datas->product_name=$request->name;
        $datas->slug=$request->slug;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().$file->getClientOriginalName();
            $file->move(base_path().'/../public_html/backend/images/products/',$filename);
            $datas->image=$filename;
        }
        $datas->new_price=$request->new_price;
        $datas->old_price=$request->old_price;
        $datas->rating=$request->rating;
        $datas->brand=$request->brand;
        $datas->availability=$request->availability;
        $datas->manufactured=$request->manufacture;
        $datas->delivery=$request->delivery;
        $datas->discount=$request->discount;
        $datas->detail=$request->detail;
        $datas->save();

        $id=$datas['id'];

        if($request->hasFile('scroll_image')){
            foreach ($request->scroll_image as $file){
                $filename=time().'.'.$file->getClientOriginalName();
                $file -> storeAs('public/backend/images/products/',$filename);
                $file -> move(base_path().'/../public_html/backend/images/products/',$filename);
                $data=new DetailImage;
                $data->Product_id=$id;
                $data->images=$filename;
                $data->save();
            }
        }


        return redirect()->back()->with('success','products added successfully!!!');


    }

    public function product_edit(Request $request){
        $id=(int)$request->id;
        $data=Product::find($id);
        $cata=Category::all();
        $selected_catagory=$data->category_id;
        $cats=Category::find($selected_catagory);
        $selected_menu=$data->menu_id;
        $menu=Menu::find($selected_menu);
        $selected_submenu=$data->submenu_id;
        $submenu=Submenu::find($selected_submenu);
        /*dd( $selected_submenu);*/
        return view('backend.pages.products.product_edit',compact('data','cata','selected_catagory','cats','menu','submenu'));
    }

    public function productedit_action(Request $request){
        $id=(int)$request->id;
        $datas=Product::find($id);
        $datas->category_id=$request->category;
        $datas->menu_id=$request->menu_id;

        /*$datas->submenu_id=$request->submenu_id;*/
        $datas->product_name=$request->name;
        $datas->slug=$request->slug;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(base_path().'/../public_html/backend/images/products/',$filename);
            $datas->image=$filename;
        }
        $datas->new_price=$request->new_price;
        $datas->old_price=$request->old_price;
        $datas->rating=$request->rating;
        $datas->brand=$request->brand;
        $datas->availability=$request->availability;
        $datas->manufactured=$request->manufacture;
        $datas->delivery=$request->delivery;
        $datas->discount=$request->discount;
        $datas->detail=$request->detail;
        $datas->new=$request->new;
        $datas->featured=$request->featured;
        $datas->special=$request->special;
        $datas->offer=$request->offer;
        $datas->save();
        return redirect()->back()->with('success','Updated successfully!!!');
    }

    public function product_del(Request $request){
        $id=(int)$request->id;
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('success','Deleted successfully!!!');

    }

    public function detailimage_del(Request $request){
        $id=(int)$request->id;
        $data=DetailImage::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function setmainimage(Request $request){
        $id=(int)$request->id;
        $data=Product::find($id);
        $data->image=$request->img;
        $data->save();
        return redirect()->back()->with('success','set successfully!!!');
    }

    public function detailimage_action(Request $request){
        $id=(int)$request->id;

        if($request->hasFile('scroll_image')){
            foreach ($request->scroll_image as $file){
                $filename=time().'.'.$file->getClientOriginalName();
                $file -> storeAs('public/backend/images/products/',$filename);
                $file -> move(base_path().'/../public_html/backend/images/products/',$filename);
                $data=new DetailImage;
                $data->Product_id=$id;
                $data->images=$filename;
                $data->save();
            }
        }
        return redirect()->back()->with('success','updated successfully!!!');

    }


}
