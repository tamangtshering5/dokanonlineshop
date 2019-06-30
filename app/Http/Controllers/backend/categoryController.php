<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    public function index()
    {
        $this_data['categories'] = Category::Orderby('id','desc')->get();
        return view('backend.pages.category.add',$this_data);
    }

    public function add(Request $request)
    {
        $this->validate($request,[

              'category' => 'required|unique:categories,category',
              'slug' => 'required',
        ]);

        $datas = new Category;
        $datas->category = ucwords($request->category);
        $datas->slug = $request->slug;
        $datas->save();
        return redirect()->back()->with('success',"Category added successfully!!!!!");

    }

    public function delete(Request $request){
        $id = (int)$request->id;
        $datas = Category::find($id);

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

    public function edit(Request $request)
    {

        $id = $request->id;
        $datas = Category::find($id);
        $cats = Category::Orderby('id','desc')->get()->except($id);
        if($datas){
            return view('backend.pages.category.edit',compact('datas','cats'));
        }
        else{
            return redirect()->back()->with('error','No Category Found!!!');
        }

    }

    public function update(Request $request)
    {

        $id = $request->id;
        $datas = Category::find($id);
        $cats = Category::Orderby('id','desc')->get()->except($id);
        if($datas){

            $datas->category = ucwords($request->category);
            $datas->slug = $request->slug;
            $datas->save();
            return redirect()->back()->with('success',"Category updated successfully!!!!!");
        }
        else{
            return redirect()->back()->with('error','Something went wrong!!!');
        }

    }




}
