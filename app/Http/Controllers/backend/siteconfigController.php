<?php

namespace App\Http\Controllers\backend;
use App\Model\Info;
use App\Model\Logo;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class siteconfigController extends Controller
{
    public function add(Request $request)
    {

        /*$this->validate($request,[

            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);*/


        $id = (int)$request->id;
        $datas = Logo::find($id);
        /*dd($datas);*/
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().$file->getClientOriginalName();
            $file->move(base_path().'/../public_html/frontend/image/logo/',$filename);
            $datas->image=$filename;
        }
        /*if($request->hasFile('image'))
        {

            $file = Input::File('image');
            $filename = time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/logo/',$filename);

            $datas->image = $filename;
            $datas->save();
        }*/
        $datas->save();
        return redirect()->back()->with('success','Logo Succesfully Updated!!!!');

    }


    public function infoupdate(Request $request)
    {
        $id = (int)$request->id;
        $datas = Info::find($id);

        $datas->address = $request->address;
        $datas->email = $request->email;
        $datas->phone1 = $request->phone1;
        $datas->phone2 = $request->phone2;
        $datas->fblink = $request->fblink;
        $datas->twitterlink = $request->twitterlink;
        $datas->googlelink = $request->googlelink;
        $datas->instalink = $request->instalink;
        $datas->googlemap = $request->googlemap;
        $datas->save();

        return redirect()->back()->with('success','Site information Succesfully Updated!!!!');

    }


}
