<?php

namespace App\Http\Controllers\backend;

use App\HotDeal;
use App\HotdealImage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotdealController extends Controller
{
    public function hotdeal(){
        $hotdeal=HotDeal::all();
        $hotimage=HotdealImage::all();
        return view('backend.pages.hotdeal.hotdeal',compact('hotdeal','hotimage'));
    }

    public function hotdeal_action(Request $request){
        $datas=new HotDeal;
        $this->validate($request,['name'=>'required',
            'image'=>'required',
            'old_price'=>'required',
            'new_price'=>'required',
            'brand'=>'required',
            'manufacture'=>'required',
            'delivery'=>'required',
            'rating'=>'required',
            'detail'=>'required']);

        $datas->product_name=$request->name;
        $datas->eventdate=$request->eventdate;
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
        $datas->manufacture=$request->manufacture;
        $datas->delivery=$request->delivery;
        $datas->discount=$request->discount;
        $datas->detail=$request->detail;
        $datas->save();

        $id=$datas['id'];

        if($request->hasFile('scroll_image')){
            foreach ($request->scroll_image as $file){
                $filename=time().'.'.$file->getClientOriginalName();
                $file -> storeAs('public/backend/images/hotdeals/',$filename);
                $file -> move(base_path().'/../public_html/backend/images/hotdeals/',$filename);
                $data=new HotdealImage;
                $data->hotdeal_id=$id;
                $data->images=$filename;
                $data->save();
            }
        }


        return redirect()->back()->with('success','product added successfully!!!');

    }

    public function hotdeal_edit(Request $request){
        $id=(int)$request->id;
        $data=HotDeal::find($id);
        return view('backend.pages.hotdeal.hotdeal_edit',compact('data'));
    }

    public function hotdeal_del(Request $request){
        $id=(int)$request->id;
        $data=HotDeal::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');
    }

    public function hotdealimage_del(Request $request){
        $id=(int)$request->id;
        $data=HotdealImage::find($id);
        $data->delete();
        return redirect()->back()->with('success','deleted successfully!!!');

    }

    public function setmainimage(Request $request){
        $id=(int)$request->id;
        $data=HotDeal::find($id);
        $data->image=$request->img;
        $data->save();
        return redirect()->back()->with('success','set successfully!!!');
    }

    public function detailimage_action(Request $request){
        $id=(int)$request->id;

        if($request->hasFile('scroll_image')){
            foreach ($request->scroll_image as $file){
                $filename=time().'.'.$file->getClientOriginalName();
                $file -> storeAs('public/backend/images/hotdeals/',$filename);
                $file -> move(base_path().'/../public_html/backend/images/hotdeals/',$filename);
                $data=new HotdealImage();
                $data->hotdeal_id=$id;
                $data->images=$filename;
                $data->save();
            }
        }
        return redirect()->back()->with('success','updated successfully!!!');

    }

    public function hotdealedit_action(Request $request){
        $id=(int)$request->id;
        $datas=HotDeal::find($id);
        $datas->product_name=$request->name;
        $datas->eventdate=$request->eventdate;
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
        $datas->manufacture=$request->manufacture;
        $datas->delivery=$request->delivery;
        $datas->discount=$request->discount;
        $datas->detail=$request->detail;
        $datas->save();
        return redirect()->back()->with('success','Updated successfully!!!');
    }
}
