<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use App\Model\Menu;
use App\Model\Submenu;
use App\Model\Submenuimage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class submenuController extends Controller
{
    public function index()
    {
        /*$this_data['category'] = Category::Orderby('id','desc')->get();
        $this_data['menu']=Menu::Orderby('id','desc')->get();
        $this_data['submenus']=Submenu::Orderby('id','desc')->paginate(8);*/
        $menu=Menu::all();
        $category=Category::all();
        $submenu=Submenu::Orderby('id','desc')->paginate(8);
        return view('backend.pages.submenu.addsubmenu',/*$this_data*/compact('submenu','category','menu'));
    }

    public function menuchoose(Request $request)
    {
        $id = (int)$request->id;
        if($id)
        {
           $datas = Menu::where('category_id',$id)->get();
           if($datas)
           {
               return response()->json($datas);
           }
           else
           {
               $datas = 0;
               return response()->json($datas);
           }

        }
        else
        {
            return redirect()->back()->with('error',"Something went wrong!!");
        }

    }

    public function add(Request $request)
    {

        $this->validate($request,[

            'category_id' => 'required',
            'title' => 'required',
        ]);

        if($request->menu_id == 0)
        {
            $datas = new Submenu;
            $datas->title = ucwords($request->title);
            $datas->slug = $request->slug;
            $datas->category_id = $request->category_id;
            $datas->save();

            $submenu_id = $datas->id;

            if ($request->hasFile('image')) {

                foreach ($request->image as $file) {

                    $filename = time().'.'.$file->getClientOriginalName();
                    $file -> move(public_path().'/frontend/image/product/',$filename);
                    $datas = new Submenuimage;
                    $datas->image = $filename;
                    $datas->submenu_id = $submenu_id;
                    $datas->save();

                }
            }


            return redirect()->back()->with('success','ITEM ADDED SUCCESSFULLY !!');
        }
        else
            {
                $datas = new Submenu;
                $datas->title = ucwords($request->title);
                $datas->slug = $request->slug;
                $datas->category_id = $request->category_id;
                $datas->menu_id = $request->menu_id;
                $datas->save();

                $submenu_id = $datas->id;

                if ($request->hasFile('image')) {

                    foreach ($request->image as $file) {

                        $filename = time().'.'.$file->getClientOriginalName();
                        $file -> move(public_path().'/frontend/image/product/',$filename);
                        $datas = new Submenuimage;
                        $datas->image = $filename;
                        $datas->submenu_id = $submenu_id;
                        $datas->save();

                    }
                }


                return redirect()->back()->with('success','ITEM ADDED SUCCESSFULLY !!');
            }


    }

    public function view()
    {
        $this_data['submenus'] = Submenu::Orderby('id','desc')->get();
        return view('backend.pages.submenu.view',$this_data);
    }

    public function edit(Request $request){
        $id=(int)$request->id;
        $datas=Submenu::find($id);
        $submenus = Submenu::Orderby('id','desc')->paginate(8);
        $m_id=$datas->menu_id;
        $menus=Menu::Orderby('id','desc')->get()->except($m_id);
        $c_id = $datas->category_id;
        $categories = Category::Orderby('id','desc')->get()->except($c_id);
        return view('backend.pages.submenu.edit',compact('datas','submenus','categories','menus'));
    }

    public function update(Request $request){
        $id=(int)$request->id;
        $datas=Submenu::find($id);
        if($datas){

            $datas->title = ucwords($request->title);
            $datas->slug = $request->slug;
            $datas->category_id = $request->category_id;
            $datas->menu_id=$request->menu_id;
            $datas->save();
            return redirect()->back()->with('success',"Menu updated successfully!!!!!");
        }
        else{
            return redirect()->back()->with('error','Something went wrong!!!');
        }
    }
    
    public function delete(Request $request){
        $id=(int)$request->id;
        $data=Submenu::find($id);
        $data->delete();
        return redirect()->back()->with('success',"Deleted successfully!!!!!");
    }



}
