<?php
Route::get('/console',function(){
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('view:clear');
   return 'done';
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'frontend'],function(){

    Route::get('/','IndexController@index')->name('dashboard');
   /* Route::get('/Single_product_details/{slug}','IndexController@singleproductdetails')->name('singleproductdetails');*/
    Route::get('/product-details/{slug?}','IndexController@product_details')->name('product_details');
    Route::get('/hotdeal_details/{slug?}','IndexController@hotdeal_details')->name('hotdeal_details');
    Route::get('/submenu-products/{slug?}','IndexController@submenupage')->name('submenupage');
    /*//////////sort*/
    Route::get('/sort-by-popularity','IndexController@sortsubmenu');
    Route::get('/cartitems','CartController@addcart')->name('addcart');
    Route::get('/hotcart','CartController@hotaddcart')->name('hotaddcart');
    Route::get('/removecart','CartController@cartremove')->name('cartremove');
    Route::get('/checkout','IndexController@checkout')->name('checkout')->middleware('invoice');
    Route::post('/checkout','IndexController@checkout_action')->name('checkout_action');
    Route::get('/invoice','IndexController@invoice')->name('invoice')->middleware('invoice');
    Route::get('/mycart','IndexController@mycart')->name('mycart');
    Route::get('/cart-update','CartController@update');
    Route::get('/download-invoice','IndexController@download_pdf')->name('download_invoice');
    Route::get('/jpt','IndexController@jpt')->name('jpt');
    Route::get('/jptdownload','IndexController@jptdownload')->name('jptdownload');

    /*//////////search//////////////*/
    Route::get('/catasearch','IndexController@catasearch')->name('catasearch');
    Route::get('/search','IndexController@search')->name('search');

    /*////////////offer//////////*/
    Route::get('/latest-offer','IndexController@offer')->name('latest_offer');

    /*////terms////////*/
    Route::get('/terms-conditions','IndexController@terms')->name('terms_conditions');

    /*/////faq///*/
    Route::get('/faq','IndexController@faq')->name('faq');

    Route::get('/refund','IndexController@refund')->name('refund');

    Route::get('/payment-info','IndexController@payment')->name('payment');

    Route::get('/about-us','IndexController@about_us')->name('about_us');

    Route::get('/contact-us','IndexController@contact')->name('contact');
    Route::post('/contact-us','IndexController@contact_action')->name('contact_action');
    Route::get('/home','IndexController@continue')->name('continue');


});





/*-----------------------------Backend Start--------------------------------------*/

Route::get('/register','backend\admincontroller@register')->name('adminregister');
Route::post('/register','backend\admincontroller@registeraction')->name('admin-register');
Route::get('/@dashboard@','backend\admincontroller@login');
Route::post('/login_action','backend\admincontroller@loginaction')->name('admin-login');
Route::post('/logout','backend\admincontroller@logout')->name('logout');
Route::post('/register','backend\admincontroller@registeraction')->name('admin-register');


/*-----------------------------Backend cart controller--------------------------------------*/

Route::get('/cart','backend\CartController@index')->name('cart.index');
Route::post('/cart-action','backend\CartController@add')->name('cart.add');
Route::post('/cart-destroy','backend\CartController@destroy')->name('cart-destroy');


/*----------------------------------------------------------------------------*/


Route::group(['namespace'=>'backend','middleware'=>'auth','prefix'=>'Dashboard'],function() {


    Route::get('/', 'admincontroller@index')->name('home');
    Route::get('/profile', 'admincontroller@profile')->name('admin-profile');
    Route::post('/profile-action', 'admincontroller@profileaction')->name('adminprofile');
    Route::post('/profile/password', 'admincontroller@passwordaction')->name('adminpassword');
    Route::post('/profile/delete', 'admincontroller@adminprofiledelete')->name('admin-profile-delete');


    /*-----------------------------Backend logo and setting--------------------------------------*/

    Route::post('/Logo_update', 'siteconfigController@add')->name('admin-logo');
    Route::post('/Info_update/{id}', 'siteconfigController@infoupdate')->name('admin-information-update');

    /*-----------------------------Backend Testimonial--------------------------------------*/

    Route::get('/Testimonial', 'testimonialController@index')->name('admin-testimonial');
    Route::post('/Testimonial_action', 'testimonialController@add')->name('admin-testimonial-add');
    Route::post('/Testimonial_delete/{id}', 'testimonialController@delete')->name('admin-testimonial-delete');

    /*-----------------------------Backend slider--------------------------------------*/
    Route::get('/Slider', 'SliderController@index')->name('admin-slider');
    Route::post('/Slider_action', 'SliderController@add')->name('admin-slider-action');
    Route::post('/Slider_delete/{id}', 'SliderController@delete')->name('admin-slider-delete');

    /*-----------------------------Backend product(category)--------------------------------------*/

    Route::get('/Category', 'categoryController@index')->name('admin-category');
    Route::post('/Category_action', 'categoryController@add')->name('admin-category-add');
    Route::post('/Category_delete/{id}', 'categoryController@delete')->name('admin-category-delete');
    Route::get('/Category_edit/{id}', 'categoryController@edit')->name('admin-category-edit');
    Route::post('/Category_update/{id}', 'categoryController@update')->name('admin-category-update');

    /*-----------------------------Backend product(menu)--------------------------------------*/

    Route::get('/Menu', 'menuController@index')->name('admin-menu');
    Route::post('/Menu_action', 'menuController@add')->name('admin-menu-add');
    Route::post('/Menu_delete/{id}', 'menuController@delete')->name('admin-menu-delete');
    Route::get('/Menu_edit/{id}', 'menuController@edit')->name('admin-menu-edit');
    Route::post('/Menu_update/{id}', 'menuController@update')->name('admin-menu-update');

    /*-----------------------------Backend product(submenu)--------------------------------------*/

    Route::get('/Submenu', 'submenuController@index')->name('admin-submenu');
    Route::get('/Menu_choose', 'submenuController@menuchoose'); /*---------ajax----------*/
    Route::post('/Submenu_add', 'submenuController@add')->name('admin-submenu-add');
    Route::get('/Submenu_view', 'submenuController@view')->name('admin-submenu-view');
    Route::get('/Submenu_edit/{id}', 'submenuController@edit')->name('admin-submenu-edit');
    Route::post('/Submenu_update/{id}', 'submenuController@update')->name('admin-submenu-update');
    Route::post('/submenu-delete/{id}','submenuController@delete')->name('admin-submenu-delete');

    /*----------------------------products--------------------------------------------------*/

    Route::get('/products','productsController@index')->name('products');
    Route::get('/subcatagory-select','productsController@subcatagory_select');
    Route::get('/childcatagory-select','productsController@childcatagory_select');
    Route::get('/subproducts-find','productsController@products_find')->name('products_find');
    Route::get('/childproducts-find','productsController@cproducts_find')->name('cproducts_find');
    Route::post('/products','productsController@products_action')->name('products_action');
    Route::get('/product_edit','productsController@product_edit')->name('product_edit');
    Route::post('/product_edit','productsController@productedit_action')->name('productedit_action');
    Route::post('/product-del','productsController@product_del')->name('product_del');
    Route::post('/detailimage_del','productsController@detailimage_del')->name('detailimage_del');
    Route::post('/setmainimage','productsController@setmainimage')->name('setmainimage');
    Route::post('detailimage_action','productsController@detailimage_action')->name('detailimage_action');
    Route::get('/hotdeals','HotdealController@hotdeal')->name('hotdeals');
    Route::post('/hotdeals','HotdealController@hotdeal_action')->name('hotdeal_action');
    Route::get('/hotdeal_edit','HotdealController@hotdeal_edit')->name('hotdeal_edit');
    Route::post('/hotdeal_edit','HotdealController@hotdealedit_action')->name('hotdealedit_action');
    Route::post('/hotdeal_del','HotdealController@hotdeal_del')->name('hotdeal_del');
    Route::post('/hotdealimage_del','HotdealController@hotdealimage_del')->name('hotdealimage_del');
    Route::post('/hot_setmainimage','HotdealController@setmainimage')->name('hot_setmainimage');
    Route::post('hotdetailimage_action','hotdealController@detailimage_action')->name('hotdetailimage_action');

    Route::get('/advertisement','AdvertController@advertisement')->name('advertisement');
    Route::get('/advert-edit','AdvertController@advert_edit')->name('advert_edit');
    Route::post('/advert-edit','AdvertController@advertedit_action')->name('advertedit_action');

    Route::get('/terms','PagesController@terms')->name('terms');
    Route::get('/terms-edit','PagesController@terms_edit')->name('terms_edit');
    Route::post('/terms-edit','PagesController@termsedit_action')->name('termsedit_action');

    Route::get('/faq','PagesController@faq')->name('backfaq');
    Route::post('/faq','PagesController@faq_action')->name('faq_action');
    Route::get('/faq-edit','PagesController@faq_edit')->name('faq_edit');
    Route::post('/faq-edit','PagesController@faqedit_action')->name('faqedit_action');
    Route::post('/faq-del','PagesController@faq_del')->name('faq_del');

    Route::get('brefund','PagesController@refund')->name('brefund');
    Route::get('/refund-edit','PagesController@refund_edit')->name('refund_edit');
    Route::post('/refund-edit','PagesController@refundedit_action')->name('refundedit_action');
    
    Route::get('babout','PagesController@about')->name('babout');
    Route::get('/about-edit','PagesController@about_edit')->name('about_edit');
    Route::post('/about-edit','PagesController@aboutedit_action')->name('aboutedit_action');

    Route::get('/admin-testimonial','PagesController@testimonial')->name('admin_testimonial');
    Route::post('/admin-testimonial','PagesController@testimonial_action')->name('testimonial_action');
    Route::get('/testimonial-edit','PagesController@testimonial_edit')->name('testimonial_edit');
    Route::post('/testimonial_del','PagesController@testimonial_del')->name('testimonial_del');
    Route::post('/testimonial-edit','PagesController@testimonialedit_action')->name('testimonialedit_action');

    Route::get('/features','PagesController@features')->name('features');
    Route::get('/feature-edit','PagesController@feature_edit')->name('feature_edit');
    Route::post('/feature-edit','PagesController@featureedit_action')->name('featureedit_action');
    
    Route::get('/best-seller-text','PagesController@best_seller_text')->name('best_seller_text');
    Route::post('/best-seller-text','PagesController@best_action')->name('best_action');



/*/////////////notification///////////////////*/
 Route::post('allbooking-message', 'notificationController@bookingMessages');
    Route::get('/allbooking_message','notificationController@viewbookingMessages')->name('allbooking-message');
    Route::get('allbooking-view','notificationController@allbooking_view')->name('allbooking-view');
    Route::post('/status_update','notificationController@status_update')->name('status_update');
    Route::get('/allbooking-delete','notificationController@allbooking_delete')->name('allbooking-delete');
    Route::post('/allbooking-delete','notificationController@allbooking_delete_action')->name('allbooking-delete-action');



});

