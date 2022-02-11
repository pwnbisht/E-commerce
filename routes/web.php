<?php

use App\Http\Controllers\admin_controllers\CategoryController;
use App\Http\Controllers\admin_controllers\AdminController;
use App\Http\Controllers\admin_controllers\CouponController;
use App\Http\Controllers\admin_controllers\SizeController;
use App\Http\Controllers\admin_controllers\ColorController;
use App\Http\Controllers\admin_controllers\ProductController;
use App\Http\Controllers\admin_controllers\BrandController;
use App\Http\Controllers\admin_controllers\TaxController;
use App\Http\Controllers\admin_controllers\CustomerController;
use App\Http\Controllers\admin_controllers\HomeBannerController;
use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });




// --------------------------------------------- payment gateway  -------------------------------------------

Route::get('/instamojo_payment_redirect',[FrontController::class,'instamojo_payment_redirect']);

// --------------------------------------------- payment gateway-------------------------------------------




// --------------------------------------------- Admin Login Routes -----------------------------------------------------

//for login page
Route::get('admin',[AdminController::class,'index']);

//for login page's login button
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

// --------------------------------------------- End Admin Login Routes--------------------------------------------------





//middleware
Route::group(['middleware'=>'admin_auth'], function(){

    //Admin dashboard
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);


    // --------------------------------------------- Category Routes --------------------------------------------------------------------------
    //for category main(table) page
    Route::get('admin/category',[CategoryController::class,'index']);

    //for add-category page ( form )
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
    
    //add data into category from add-category page
    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.insert');

    // delete category
    Route::get('admin/category/delete_category/{id}',[CategoryController::class,'delete_category']);

    //update category   {same as add category route}
    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);

    //Change cagtegory status
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);

    // --------------------------------------------- End Category Routes-----------------------------------------------------------------------



    // -------------------------------------------------- Coupon Routes ---------------------------------------------------------------
    //for coupon main(list) page
    Route::get('admin/coupon',[CouponController::class,'index']);

    //for add-coupon page ( form )
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
    
    //add data into Database (coupans table) from add-coupan page
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.insert');

    // delete coupan
    Route::get('admin/coupon/delete_coupon/{id}',[CouponController::class,'delete_coupon']);

    //update ccoupan   {same as add coupan route}
    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);

    //Change coupon status
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);

    // --------------------------------------------------- End Coupon Routes ----------------------------------------------------------



    // -------------------------------------------------- Size Routes ---------------------------------------------------------------
    //for size main(list) page
    Route::get('admin/size',[SizeController::class,'index']);

    //for add-size page ( form )
    Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
    
    //add data into Database (size table) from add-size page
    Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.insert');

    // delete size
    Route::get('admin/size/delete_size/{id}',[SizeController::class,'delete_size']);

    //update size   {same as add size route}
    Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size']);

    //Change size status
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);

    // --------------------------------------------------- End Size Routes ----------------------------------------------------------



    // -------------------------------------------------- Color Routes ---------------------------------------------------------------
    //for color main(list) page
    Route::get('admin/color',[ColorController::class,'index']);

    //for add-color page ( form )
    Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
    
    //add data into Database (color table) from add-color page
    Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.insert');

    // delete color
    Route::get('admin/color/delete_color/{id}',[ColorController::class,'delete_color']);

    //update color   {same as add color route}
    Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color']);

    //Change color status
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);

    // --------------------------------------------------- End Color Routes ----------------------------------------------------------
    


    // -------------------------------------------------- Products Routes ---------------------------------------------------------------
    // for product main(list) page
    Route::get('admin/product',[ProductController::class,'index']);

    // for add-product page ( form )
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
    
    // add data into Database (product table) from add-product page
    Route::post('admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product.insert');

    // delete product
    Route::get('admin/product/delete_product/{id}',[ProductController::class,'delete']);

    // update product   {same as add product route}
    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);

    // Change product status
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);

    // delete product arrtibute
    Route::get('admin/product/product_attr_delete/{paid}/{pid}',[ProductController::class,'product_attr_delete']);

    // delete multiple images
    Route::get('admin/product/product_images_delete/{paid}/{pid}',[ProductController::class,'product_images_delete']);

    // --------------------------------------------------- End Products Routes ----------------------------------------------------------



    // -------------------------------------------------- Brand Routes ---------------------------------------------------------------
    // for brand main(list) page
    Route::get('admin/brand',[BrandController::class,'index']);

    // for add-brand page ( form )
    Route::get('admin/brand/manage_brand',[BrandController::class,'manage_brand']);
    
    // add data into Database (brand table) from add-brand page
    Route::post('admin/brand/manage_brand_process',[BrandController::class,'manage_brand_process'])->name('brand.insert');

    // delete brand
    Route::get('admin/brand/delete_brand/{id}',[BrandController::class,'delete_brand']);

    // update brand   {same as add brand route}
    Route::get('admin/brand/manage_brand/{id}',[BrandController::class,'manage_brand']);

    // Change brand status
    Route::get('admin/brand/status/{status}/{id}',[BrandController::class,'status']);
    // --------------------------------------------------- End Brand Routes ----------------------------------------------------------



    // -------------------------------------------------- Tax Routes ---------------------------------------------------------------
    //for tax main(list) page
    Route::get('admin/tax',[TaxController::class,'index']);

    //for add-tax page ( form )
    Route::get('admin/tax/manage_tax',[TaxController::class,'manage_tax']);
    
    //add data into Database (tax table) from add-tax page
    Route::post('admin/tax/manage_tax_process',[TaxController::class,'manage_tax_process'])->name('tax.insert');

    // delete tax
    Route::get('admin/tax/delete_tax/{id}',[TaxController::class,'delete_tax']);

    //update tax   {same as add tax route}
    Route::get('admin/tax/manage_tax/{id}',[TaxController::class,'manage_tax']);

    //Change tax status
    Route::get('admin/tax/status/{status}/{id}',[TaxController::class,'status']);

    // --------------------------------------------------- End Tax Routes ----------------------------------------------------------



    // -------------------------------------------------- customer Routes ---------------------------------------------------------------
    //for tax main(list) page
    Route::get('admin/customer',[CustomerController::class,'index']);

    //for show-customer page ( form )
    Route::get('admin/customer/show/{id}',[CustomerController::class,'show'])->name('admin.show');

    //Change tax status
    Route::get('admin/customer/status/{status}/{id}',[CustomerController::class,'status']);

    // --------------------------------------------------- End customer Routes ----------------------------------------------------------


    
    // -------------------------------------------------- Home Page Banner Routes ---------------------------------------------------------------
    // for Home Page Banner main(list) page
    Route::get('admin/home_banner',[HomeBannerController::class,'index']);

    // for add-Home Page Banner page ( form )
    Route::get('admin/home_banner/manage_home_banner',[HomeBannerController::class,'manage_home_banner']);
    
    // add data into Database (Home Page Banner table) from add-Home Page Banner page
    Route::post('admin/home_banner/manage_home_banner_process',[HomeBannerController::class,'manage_home_banner_process'])->name('home_banner.insert');

    // delete Home Page Banner
    Route::get('admin/home_banner/delete_home_banner/{id}',[HomeBannerController::class,'delete_home_banner']);

    // update Home Page Banner   {same as add Home Page Banner route}
    Route::get('admin/home_banner/manage_home_banner/{id}',[HomeBannerController::class,'manage_home_banner']);

    // Change Home Page Banner status
    Route::get('admin/home_banner/status/{status}/{id}',[HomeBannerController::class,'status']);
    // --------------------------------------------------- Home Page Banner Routes ----------------------------------------------------------



    // --------------------------------------------- LogOut --------------------------------------------------------------------------------

    //for logout
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout successfully');
        return redirect('admin');
    });

    // --------------------------------------------- End Logout------------------------------------------------------------------------------

});


// --------------------------------------------- Start Front End HomePage --------------------------------------------------------------------

Route::get('/',[FrontController::class,'index']);

// --------------------------------------------- End Front End HomePage ----------------------------------------------------------------------


// --------------------------------------------- Routes for front end Product details page --------------------------------------------------------------------

Route::get('product/{slug}',[FrontController::class,'product']);

// --------------------------------------------- Routes for front end Product details pag ----------------------------------------------------------------------



// --------------------------------------------- Add to Cart Route --------------------------------------------------------------------

//add to cart from home
Route::post('add_to_cart',[FrontController::class,'add_to_cart']);

//cart page
Route::get('cart',[FrontController::class,'cart']);

// --------------------------------------------- End Add to Cart Route --------------------------------------------------------------------



// --------------------------------------------- Category Page --------------------------------------------------------------------

Route::get('category/{slug}',[FrontController::class,'category']);

// --------------------------------------------- Category Page --------------------------------------------------------------------



// --------------------------------------------- Search box --------------------------------------------------------------------

Route::get('search/{str}',[FrontController::class,'search']);

// --------------------------------------------- Search Box --------------------------------------------------------------------



// --------------------------------------------- Registration Custmor page --------------------------------------------------------------------

Route::get('registration',[FrontController::class,'registration']);

// --------------------------------------------- Registration Custmor page --------------------------------------------------------------------



// --------------------------------------------- Registration Custmor (inster data into DB) --------------------------------------------------------------------

Route::post('registration_process',[FrontController::class,'registration_process'])->name('reg.process');

// --------------------------------------------- Registration Custmor (inster data into DB) --------------------------------------------------------------------



// --------------------------------------------- Verify Registration email --------------------------------------------------------------------

Route::get('verification/{id}',[FrontController::class,'email_verification']);

// --------------------------------------------- Verify Registration email --------------------------------------------------------------------



// --------------------------------------------- Login Custmor (inster data into DB) ---------------------------------------------------------

Route::post('login_process',[FrontController::class,'login_process'])->name('login.process');

// --------------------------------------------- Login Custmor (inster data into DB) ---------------------------------------------------------




// --------------------------------------------- forgot Password --------------------------------------------------------------------

//forgot password
Route::post('forgot_password ',[FrontController::class,'forgot_password']);

//change password view
Route::get('forgot_password_change/{id}',[FrontController::class,'forgot_password_change']);

//change password button
Route::post('forgot_password_change_process',[FrontController::class,'forgot_password_change_process']);

// --------------------------------------------- forgot Password  --------------------------------------------------------------------



// --------------------------------------------- Checkout --------------------------------------------------------------------

//Checkout
Route::get('checkout',[FrontController::class,'checkout']);


// --------------------------------------------- Checkout  --------------------------------------------------------------------



// --------------------------------------------- CuponCode -------------------------------------------

Route::post('apply_coupon_code',[FrontController::class,'apply_coupon_code']);

// --------------------------------------------- CuponCode -------------------------------------------



// --------------------------------------------- remove CuponCode -------------------------------------------

Route::post('remove_coupon_code',[FrontController::class,'remove_coupon_code']);

// --------------------------------------------- remove CuponCode -------------------------------------------



// --------------------------------------------- Place order -------------------------------------------

Route::post('place_order',[FrontController::class,'place_order']);

// --------------------------------------------- Place order -------------------------------------------



// --------------------------------------------- after Order Placed  -------------------------------------------

//if order status = success
Route::get('order_placed',[FrontController::class,'order_placed']);

//fir order failed
Route::get('order_failed',[FrontController::class,'order_failed']);

// --------------------------------------------- after Order Placed-------------------------------------------




// --------------------------------------------- Custmor LogOut ------------------------------------------------------------------


//for logout
Route::get('/logout', function () {
    session()->forget('FRONT_USER_LOGIN');
    session()->forget('FRONT_USER_ID');
    session()->forget('FRONT_USER_NAME');
    session()->flash('error','Logout successfully');
    return redirect('/');
});

// --------------------------------------------- End Custmor Logout-----------------------------------------------------------------