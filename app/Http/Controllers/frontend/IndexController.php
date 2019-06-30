<?php

namespace App\Http\Controllers\frontend;

use App\Advertisement;
use App\Checkout;
use App\Contact;
use App\Faq;
use App\Feature;
use App\Best;
use App\HotDeal;
use App\HotdealImage;
use App\Model\Category;
use App\Model\Info;
use App\Model\Logo;
use App\Model\Menu;
use App\Model\Product;
use App\Model\Productmenu;
use App\Model\Productsubmenu;
use App\Model\Slider;
use App\Model\Submenu;
use Mail;
use App\Refund;
use App\About;
use App\Term;
use App\Testimonial;
use PDF;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $slider=Slider::all();
        $products=Product::all();
        $advert=Advertisement::take(2)->get();
        $category=Category::take(3)->get();
        $a1=Category::first();
        
        $a2=Category::skip(1)->first();
        $a3=Category::skip(2)->first();
        $hotdeal=HotDeal::all();
        $rated=Product::orderBy('rating','DESC')->take(12)->get();
        $special=Product::where('special','1')->get();
        $best=Product::orderBy('popularity','DESC')->skip(1)->take(6)->get();
        $mainbest=Product::orderBy('popularity','DESC')->take(1)->get();
        $cartitems=Cart::content();
        $infos=Info::all();
        $best_text=Best::find(1);
/*        dd($special);*/
        return view('frontend.master',compact('logo','cata','menu','slider','products','category','a1','a2','a3','hotdeal','rated','special','best','mainbest','cartitems','advert','infos','best_text'));
    }

   /* public function singleproductdetails(Request $request)
    {
        $slug = $request->slug;
        $this->_data['logo'] = Logo::Orderby('id','desc')->first();
        $this->_data['info'] = Info::Orderby('id','desc')->first();
        $this->_data['menus'] = Productmenu::Orderby('id','asc')->get();
        $this->_data['submenu'] = Productsubmenu::where('slug',$slug)->first();
        $this->_data['latests'] = Productsubmenu::Orderby('id','desc')->get();
        $this->_data['testimonials'] = Testimonial::Orderby('id','desc')->get();
        return view('frontend.pages.singleproductdetails',$this->_data);
    }*/

    public function product_details(Request $request){
        $slug=$request->slug;
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $detailimg=Product::where('slug',$slug)->first();
        $cat_id=$detailimg->category_id;
        $catalink=Category::find($cat_id);
        $add=$detailimg->popularity+1;
        $detailimg->popularity=$add;
        $detailimg->save();
        $products=Product::all();
        $hotdeal=HotDeal::all();
        $rated=Product::orderBy('rating','DESC')->get();
        $special=Product::where('special','1')->get();
        $advert=Advertisement::skip(4)->take(2)->get();
        $cartitems=Cart::content();
        $infos=Info::all();
        return view('frontend.pages.productdetails',compact('logo','cata','menu','detailimg','products','hotdeal','rated','special','cartitems','catalink','advert','infos'));
    }

    public function hotdeal_details(Request $request){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $slug=$request->slug;
        $products=Product::all();
        $rated=Product::orderBy('rating','DESC')->get();
        $special=Product::where('special','1')->get();
        $hotdeal=HotDeal::all();
        $hotdetail=HotDeal::where('slug',$slug)->first();
        $add=$hotdetail->popularity+1;
        $hotdetail->popularity=$add;
        $hotdetail->save();
        $cartitems=Cart::content();
        $infos=Info::all();
        return view('frontend.pages.hotdeal_details',compact('hotdetail','products','rated','special','hotdeal','logo','cata','menu','cartitems','infos'));
    }

    public function submenupage(Request $request){
        $slug=$request->slug;
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $menu_id=Menu::where('slug',$slug)->first();
        $menuid=$menu_id->id;
        /*$sortsub_id=$sub_id->id;*/
        $subproducts=Product::where('menu_id',$menu_id->id)->paginate(16);
        /*$subproduct=$subproducts->all();*/
        //$menu_id=$sub_id->menu_id;
        $menulink=Menu::find($menuid);
        $cat_id=$menu_id->category_id;
        $catlink=Category::find($cat_id);
        $products=Product::all();
        $rated=Product::orderBy('rating','DESC')->get();
        $special=Product::where('special','1')->get();
        $hotdeal=HotDeal::all();
        $advert=Advertisement::skip(2)->take(2)->get();
        $cartitems=Cart::content();
        $infos=Info::all();
        return view('frontend.pages.submenu_products',compact('logo','cata','menu','submenu','rated','special','hotdeal','hotdetail','products','sub_id','menulink','catlink','subproducts','sortsub_id','cartitems','advert','infos'));
    }

    public function catasearch(Request $request){
        $slug=$request->slug;
        $cata_id=Category::where('slug',$slug)->first();
        $catalink=Category::find($cata_id->id);
            $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cataproduct=Product::where('category_id',$cata_id->id)->get();
        $rated=Product::orderBy('rating','DESC')->get();
        $special=Product::where('special','1')->get();
        $hotdeal=HotDeal::all();
        $advert=Advertisement::skip(2)->take(2)->get();
        $cartitems=Cart::content();
        $infos=Info::all();
        return view('frontend.pages.cataproducts',compact('cataproduct','catalink','logo','cata','menu','submenu','rated','special','hotdeal','advert','cartitems','infos'));
    }

    public function checkout(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        return view('frontend.pages.checkout',compact('logo','cata','menu','submenu','cartitems','infos'));
    }

    public function checkout_action(Request $request){

        $this->validate($request,['g-recaptcha-response' => 'required|captcha',
        'firstname'=>'required',
        'lastname'=>'required',
            'email'=>'required',
            'phone1'=>'required',
            'province'=>'required',
            'district'=>'required',
            'city'=>'required'
            ]);
        $random = str_random(5);
        $cartitems=Cart::content();
        foreach ($cartitems as $cartitem){
            $data=new Checkout;
            $data->first_name=$request->firstname;
            $data->last_name=$request->lastname;
            $data->middle_name=$request->midname;
            $data->email=$request->email;
            $data->phone1=$request->phone1;
            $data->phone2=$request->phone2;
            $data->province=$request->province;
            $data->district=$request->district;
            $data->city=$request->city;
            $data->message=$request->message;
            $data->invoice_no=$random;
            $data->product_name=$cartitem->name;
            $data->qty=$cartitem->qty;
            $data->save();
        }


       
        $datas=array(
            'firstname'=>$request->firstname,
            'middlename'=>$request->midname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone1'=>$request->phone1,
            'phone2'=>$request->phone2,
            'province'=>$request->province,
            'district'=>$request->district,
            'city'=>$request->city,
            'msg'=>$request->message,
            'product_name'=>$request->name,
            'qty'=>$request->qty,
            
        );
        $cart=Cart::content();
        Mail::send('frontend/pages/checkoutmail',$datas,function($message)use($datas)
        {
            $message->from($datas['email']);
            $message->to('tamangtshering5@gmail.com');
        
        });

        return redirect('/invoice');

    }

    public function invoice(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        $lastdatas=Checkout::orderBy('id','DESC')->take(1)->get();

        return view('frontend.pages.invoice',compact('logo','cata','menu','submenu','cartitems','infos','lastdatas'));
    }

    public function mycart(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        return view('frontend.pages.mycart',compact('logo','cata','menu','submenu','cartitems','infos','lastdatas'));

    }

    public function download_pdf(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        $lastdatas=Checkout::orderBy('id','DESC')->take(1)->get();
        $data=Product::all();
        /* $datas=array(
            'firstname'=>$request->firstname,
            'middlename'=>$request->midname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone1'=>$request->phone1,
            'phone2'=>$request->phone2,
            'province'=>$request->province,
            'district'=>$request->district,
            'city'=>$request->city,
            'msg'=>$request->message
        );
        Mail::send('frontend/pages/checkoutmail',$datas,function($message) use($datas)
        {
            $message->from($datas['email']);
            $message->to('tamangtshering5@gmail.com');
            $message->subject($datas['subject']);
        });*/
        $pdf=PDF::loadView('frontend.pages.myinvoice',compact('data','logo','cata','menu','submenu','cartitems','infos','lastdatas'));
        return $pdf->download('invoice.pdf');
        
        Cart::destroy();
        
    }
    
    public function continue(){
        Cart::destroy();
        return redirect('/');
    }

    public function search(Request $request){
        $request->validate([
            'query' => 'required',
        ]);
        $query = $request->input('query');
        $products = Product::search($query)->paginate(12);
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        return view('frontend.pages.search',compact('products','logo','cata','menu','submenu','cartitems','infos'));
    }

    public function terms(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        $terms=Term::all();
        return view('frontend.pages.terms-conditions',compact('logo','cata','menu','submenu','cartitems','infos','terms'));
    }

    public function offer(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        $alloffer=Product::where('offer','1')->get();
        $category=Category::take(3)->get();
        $a1=Category::first();
        $a2=Category::skip(1)->first();
        $a3=Category::skip(2)->first();
        return view('frontend.pages.offer',compact('cata','menu','submenu','cartitems','infos','logo','alloffer','category','a1','a2','a3'));
    }

    public function faq(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        $firstfaq=Faq::first();
        $count=Faq::count();
        $skip=1;
        $limit=$count-$skip;
        $faqs=Faq::skip($skip)->take($limit)->get();
        $lastfaq=Faq::orderBy('created_at','DESC')->take(1)->get();
        return view('frontend.pages.faq',compact('faqs','firstfaq','lastfaq','cata','menu','submenu','cartitems','infos','logo'));
    }

    public function refund(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        $refunds=Refund::all();
        return view('frontend.pages.refund',compact('cata','menu','submenu','cartitems','infos','logo','refunds'));
    }
    
    

    public function payment(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        return view('frontend.pages.payment-info',compact('cata','menu','submenu','cartitems','infos','logo'));
    }

    public function about_us(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        $testimonial=Testimonial::all();
        $abouts=About::all();
        $features=Feature::all();
        return view('frontend.pages.about-us',compact('cata','menu','submenu','cartitems','infos','logo','testimonial','features','abouts'));
    }

    public function contact(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        return view('frontend.pages.contact',compact('cata','menu','submenu','cartitems','infos','logo'));
    }

    public function contact_action(Request $request){
        $this->validate($request,['name'=>'required',
        'email'=>'required',
        'subject'=>'required',
        'message'=>'required']);

        $datas= new Contact;
        $datas->name=$request->name;
        $datas->email=$request->email;
        $datas->subject=$request->subject;
        $datas->message=$request->message;
        $datas->save();
         $datas=array(
           'name'=>$request->name,
           'email'=>$request->email,
           'subject'=>$request->subject,
           'msg'=>$request->message
       );
       Mail::send('frontend/pages/contactmail',$datas,function($message) use($datas)
       {
           $message->from($datas['email']);
           $message->to('tamangtshering5@gmail.com');
           $message->subject($datas['subject']);
       });

        return redirect()->back()->with('success','Sent successfully!!!');
    }

    public function jpt(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        $lastdatas=Checkout::orderBy('id','DESC')->take(1)->get();
        $data=Product::all();
        return view('frontend.pages.jpt',compact('data','logo','cata','menu','submenu','cartitems','infos','lastdatas'));
    }

    public function jptdownload(){
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        $cartitems=Cart::content();
        $infos=Info::all();
        $lastdatas=Checkout::orderBy('id','DESC')->take(1)->get();
        $data=Product::all();
        $pdf=PDF::loadView('frontend.pages.jpt',compact('data','logo','cata','menu','submenu','cartitems','infos','lastdatas'));
        return $pdf->download('jpt.pdf');
    }





   /* public function sortsubmenu(Request $request){
        $id=(int)$request->pcat_id;
        $datas=Product::where('submenu_id',$id)->get();
        $popularity=$datas->popularity;
        $sortpopularity=Product::where($popularity,'DESC')->get();
        $logo=Logo::all();
        $cata=Category::all();
        $menu=Menu::all();
        $submenu=Submenu::all();
        return view('frontend.pages.sort.sortsubmenu',[
            'data'=>$datas,'logo'=>$logo,'cata'=>$cata,'menu'=>$menu,'submenu'=>$submenu,'sortpopularity'=>$sortpopularity,'CatByUser'=>'All Products'
        ]);
    }*/




}
