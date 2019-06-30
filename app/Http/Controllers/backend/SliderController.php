<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Input;
use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::/*Orderby('id','desc')->get()*/all();
        return view('backend.pages.slider.add',compact('slider'));
    }


    public function add(Request $request)
    {
        $this->validate($request,[

            'image' => 'mimes:jpeg,jpg,png',

        ]);

        $datas = new Slider;
        if($request->hasFile('image'))
        {

            $file = Input::File('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(base_path().'/../public_html/frontend/image/slider/',$filename);
            $datas->title = $request->title;
            $datas->image = $filename;
            $datas->save();
        }
        return redirect()->back()->with('success','Succesfully added!!!!');
    }


    public function delete(Request $request){
        $id = (int)$request->id;
        $datas = Slider::find($id);

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
