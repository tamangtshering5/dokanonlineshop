<?php

namespace App\Http\Controllers\backend;

use App\Faq;
use App\Feature;
use App\Refund;
use App\About;
use App\Term;
use App\Best;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function terms(){
        $datas=Term::all();
        return view('backend.pages.terms',compact('datas'));
    }

    public function terms_edit(Request $request){
        $id=(int)$request->id;
        $data=Term::find($id);
        return view('backend.pages.terms-edit',compact('data'));
    }

    public function termsedit_action(Request $request){
       $id=(int)$request->id;
       $datas=Term::find($id);
       $datas->terms=$request->detail;
       $datas->save();
        return redirect()->back()->with('success','Updated Successfully!!');
    }

    public function faq(){
        $data=Faq::all();
        return view('backend.pages.faq',compact('data'));
    }

    public function faq_action(Request $request){
        $data=new Faq;
        $data->question=$request->question;
        $data->answer=$request->ans;
        $data->save();
        return redirect()->back()->with('success','Added Successfully!!');

    }

    public function faq_edit(Request $request){
        $id=(int)$request->id;
        $data=Faq::find($id);
        return view('backend.pages.faq-edit',compact('data'));
    }

    public function faqedit_action(Request $request){
        $id=(int)$request->id;
        $data=Faq::find($id);
        $data->question=$request->question;
        $data->answer=$request->ans;
        $data->save();
        return redirect()->back()->with('success','Updated Successfully!!');

    }

    public function faq_del(Request $request){
        $id=(int)$request->id;
        $data=Faq::find($id);
        $data->delete();
        return redirect()->back()->with('success','Deleted Successfully!!');

    }

    public function refund(){
        $datas=Refund::all();
        return view('backend.pages.refund',compact('datas'));
    }

    public function refund_edit(Request $request){
        $id=(int)$request->id;
        $data=Refund::find($id);
        return view('backend.pages.refund-edit',compact('data'));
    }

    public function refundedit_action(Request $request){
        $id=(int)$request->id;
        $datas=Refund::find($id);
        $datas->refund=$request->detail;
        $datas->save();
        return redirect()->back()->with('success','Updated Successfully!!');
    }
    
    public function about(){
        $datas=About::all();
        return view('backend.pages.about',compact('datas'));
    }
    
    public function about_edit(Request $request){
        $id=(int)$request->id;
        $data=About::find($id);
        return view('backend.pages.about-edit',compact('data'));
    }
    
     public function aboutedit_action(Request $request){
        $id=(int)$request->id;
        $datas=About::find($id);
        $datas->about=$request->detail;
        $datas->save();
        return redirect()->back()->with('success','Updated Successfully!!');
    }

    public function testimonial(){
        $datas=Testimonial::all();
        return view('backend.pages.testimonial',compact('datas'));
    }

    public function testimonial_action(Request $request){
        $this->validate($request,[

            'image' => 'mimes:jpeg,jpg,png',
            'name' => 'required',
            'detail' => 'required',
            'designation'=>'required',
        ]);
        $datas=new Testimonial;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(base_path().'/../public_html/backend/images/testimonial/',$filename);
            $datas->image=$filename;
        }
        $datas->name=$request->name;
        $datas->designation=$request->designation;
        $datas->detail=$request->detail;
        $datas->save();
        return redirect()->back()->with('success','Added Successfully!!');

    }

    public function testimonial_del(Request $request){
        $id=(int)$request->id;
        $data=Testimonial::find($id);
        $data->delete();
        return redirect()->back()->with('success','Deleted Successfully!!');
    }

    public function testimonial_edit(Request $request){
        $id=(int)$request->id;
        $datas=Testimonial::find($id);
        return view('backend.pages.testimonial_edit',compact('datas'));
    }

    public function testimonialedit_action(Request $request){
        $id=(int)$request->id;
        $datas=Testimonial::find($id);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move(base_path().'/../public_html/backend/images/testimonial',$filename);
            $datas->image=$filename;
        }
        $datas->name=$request->name;
        $datas->designation=$request->designation;
        $datas->detail=$request->detail;
        $datas->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }

    public function features(){
        $datas=Feature::all();
        return view('backend.pages.features',compact('datas'));
    }

    public function feature_edit(Request $request){
        $id=(int)$request->id;
        $datas=Feature::find($id);
        return view('backend.pages.feature-edit',compact('datas'));
    }

    public function featureedit_action(Request $request){
        $id=(int)$request->id;
        $datas=Feature::find($id);
        $datas->title=$request->title;
        $datas->detail=$request->detail;
        $datas->save();
        return redirect()->back()->with('success','updated successfully!!!');
    }
    
    public function best_seller_text(){
        $data=Best::find(1);
        return view('backend.pages.best-seller-text',compact('data'));
    }
    
    public function best_action(Request $request){
        $id=(int)$request->id;
        $data=Best::find($id);
        $data->content=$request->content;
        $data->save();
        return redirect()->back()->with('success','updated successfully!!');
    }

}
