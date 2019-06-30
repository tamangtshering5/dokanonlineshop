<?php

namespace App\Http\Controllers\backend;

use App\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class notificationController extends Controller
{
    public function bookingMessages()
    {
        $notifications = Checkout::where('count', 0)->limit(5)->get();
        $count = Checkout::where('count', '=', '0')->count();
        $output = '';

        if ($count == 0) $output .= "<li><a href='" . route('allbooking-message') . "'><span><span>View Previous Messages</span></span>";

        foreach ($notifications as $key => $notification) {
            $output .= "<li><a href='" . route('allbooking-message') . "'><span>{$notification->first_name}</span><br>";
            $output .= "<span class='message'> {$notification->email}</span> </a> </li>";
        }
        $response = [
            'status' => true,
            'code' => 200,
            'data' => $output,
            'count' => $count
        ];
        return response()->json($response);
    }

    public function viewbookingMessages(){
        $datas = Checkout::Orderby('id','desc')->paginate(10);
        return view('backend.pages.notification.all_notification', compact('datas'));
    }

    public function allbooking_view(Request $request){
        $id=(int)$request->id;
        $datas=Checkout::find($id);
        $datas->count=1;
        $datas->save();
        return view('backend.pages.notification.allbooking_show',compact('datas'));
    }

    public function status_update(Request $request){
        $id=(int)$request->id;
        $datas=Checkout::find($id);
        $datas->delivery_status=$request->delivery;
        $datas->save();
        return redirect()->back();
    }
     public function allbooking_delete(Request $request){
        $id=(int)$request->id;
        /*$datas=Checkout::find($id);*/
        return view('backend.pages.notification.suredelete',compact('id'));
    }

    public function allbooking_delete_action(Request $request){
        $id=(int)$request->id;
        $datas=Checkout::find($id);
        $datas->delete();
        return redirect('/Dashboard/allbooking_message')->with('success','deleted successfully!!');
    }
}
