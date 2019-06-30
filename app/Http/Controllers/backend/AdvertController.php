<?php

namespace App\Http\Controllers\backend;

use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;

class AdvertController extends Controller
{
    public function advertisement(){
        $datas=Advertisement::all();
        return view('backend.pages.advertisement',compact('datas'));
    }

    public function advert_edit(Request $request){
        $id=(int)$request->id;
        $data=Advertisement::find($id);
        return view('backend.pages.advertedit',compact('data'));
    }

    public function advertedit_action(Request $request){
        $id=(int)$request->id;
        $data=Advertisement::find($id);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().$file->getClientOriginalName();
            $file->move(base_path().'/../public_html/backend/images/advertisement/',$filename);
            $data->image=$filename;
        }
        $data->url=$request->url;
        $data->save();
        return redirect()->back()->with('success','Updated Successfully!!');
    }
}
