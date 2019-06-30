<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Input;
use App\Model\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class testimonialController extends Controller
{

    public function index()
    {
        $test = Testimonial::Orderby('id','desc')->paginate(5);
        return view('backend.pages.testimonial.add',compact('test'));
    }

    public function add(Request $request)
    {

        $this->validate($request,[

            'image' => 'mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'details' => 'required',
        ]);

        $datas = new Testimonial;
        if($request->hasFile('image'))
        {

            $file = Input::File('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(base_path().'/../public_html/frontend/image/testimonial/',$filename);
            $datas->name = $request->name;
            $datas->details = $request->details;
            $datas->image = $filename;
            $datas->save();
        }
        return redirect()->back()->with('success','Succesfully added!!!!');

    }

    public function delete(Request $request){
        $id = (int)$request->id;
        $datas = Testimonial::find($id);

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
