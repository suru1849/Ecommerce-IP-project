<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SslCommerzPaymentController;

use Illuminate\Support\Facades\URL;
use App\Models\Product;
use App\Models\Category;



//All Frontend Route
Route::get('/','Frontend\FrontendController@index')->name('frontend2.index');
Route::get('shop','Frontend\FrontendController@shopView')->name('frontend2.shop.view');
Route::get('sign-up','Frontend\LoginController@signUp')->name('frontend2.signup');
Route::get('sign-in','Frontend\LoginController@signIn')->name('frontend2.signin');

                              
Route::middleware('auth')->group(function() {   // use for verify email:  ['auth','verified']
    Route::get('carts','Frontend\CartController@viewCart')->name('frontend2.cart.view');
    Route::post('/add-to-cart','Frontend\CartController@addProduct');
    Route::post('/remove-from-cart','Frontend\CartController@removeProduct');
    Route::post('/increment-cart','Frontend\CartController@incrementProduct');
    Route::post('/decrement-cart','Frontend\CartController@decrementProduct');
    Route::any('/place-order','Frontend\CheckoutController@placeOrder');
    Route::get('/my-orders','Frontend\UserController@index');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/view-order/{order_id}','Frontend\UserController@view_order');
});

Auth::routes();



// All Admin Panel Route

Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard','Admin\DashboardController@index');

    //Product  
    Route::prefix('products')->name('product')->group(function(){

        Route::get('','Admin\ProductController@index')->name('');
         Route::get('insert_form','Admin\ProductController@insert_form')->name('.read'); 
         Route::post('insert','Admin\ProductController@insert')->name('.insert'); 
         Route::get('edit/{id}','Admin\ProductController@edit')->name('.edit'); 
         Route::post('update/{id}','Admin\ProductController@update')->name('.update'); 
         Route::get('delete/{id}','Admin\ProductController@delete')->name('.delete'); 
                                      });

        //Order
        Route::get('/orders','Admin\OrderController@index');  
        Route::get('/admin/view-order/{order_id}','Admin\OrderController@view_order');                               
        Route::put('/update-order/{order_id}','Admin\OrderController@update_order');                               
        Route::get('/order-history','Admin\OrderController@order_history');   

        //User 
        Route::get('/users','Admin\UserController@index');
        Route::get('/view-user/{user_id}','Admin\UserController@view_user');  
                      

        

       //ajax product search
        Route::any('/admin/search/product','Admin\ProductController@search_result');

  });



