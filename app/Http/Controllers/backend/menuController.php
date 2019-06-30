<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use App\Model\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class menuController extends Controller
{
    public function index()
    {
        $this_data['categories'] = Category::Orderby('id','desc')->get();
        $this_data['menus'] = Menu::Orderby('id','desc')->paginate(8);
        return view('backend.pages.menu.add',$this_data);
    }


    public function add(Request $request)
    {
        $this->validate($request,[

               'category_id' => 'required|integer',
               'menu' => 'required|string|unique:menus,menu',
               'slug' => 'required|unique:menus',
        ]);

        $datas = new Menu;
        $datas->category_id = $request->category_id;
        $datas->menu = ucwords($request->menu);
        $datas->slug = $request->slug;
        $result = $datas->save();
        if($result)
        {
            return redirect()->back()->with('success',"Added successfully!!!");
        }
        else
            {
                return redirect()->back()->with('error',"Try again!!!");
            }

    }


    public function delete(Request $request){
        $id = (int)$request->id;
        $datas = Menu::find($id);

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
        $datas = Menu::find($id);
        $menus = Menu::Orderby('id','desc')->paginate(8);
        $c_id = $datas->category_id;
        $categories = Category::Orderby('id','desc')->get()->except($c_id);

        if($datas){
            return view('backend.pages.menu.edit',compact('datas','categories','menus'));
        }
        else{
            return redirect()->back()->with('error','No Category Found!!!');
        }

    }

   public function update(Request $request)
    {

        $id = $request->id;
        $datas = Menu::find($id);
        if($datas){

            $datas->menu = ucwords($request->menu);
            $datas->slug = $request->slug;
            $datas->category_id = $request->category_id;
            $datas->save();
            return redirect()->back()->with('success',"Menu updated successfully!!!!!");
        }
        else{
            return redirect()->back()->with('error','Something went wrong!!!');
        }

    }


}
