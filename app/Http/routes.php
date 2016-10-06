<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('product/{id}', 'ProductsController@getProduct');

/* API */
Route::get('api', 'APIController@main');


//testing
Route::get('/edit', function () {
	if(Auth::guest()){
		return view('welcome');
	}else{
		return view('edit');
	}
});

//testing
//Route::post('/change', ['uses' => 'ProductsController@changeName']);
Route::post('/change', 'ProductsController@changeName');
Route::post('/addpayment', 'PaymentController@addPaymentMethod');
Route::post('/addaddress', 'AddressController@addAddress');


Route::get('/addtocart/{product_id}', 'CartController@addToCart');
Route::get('/removefromcart/{product_id}', 'CartController@removeFromCart');


Route::get('/cart', function () {
    return view('cart');
});



Route::get('/account/address/add', function () {
    return view('account.add_address');
});
Route::get('/account/payment/add', function () {
    return view('account.add_payment');
});


Route::get('/account/address', 'AddressController@getAddress');
Route::get('/account/address/{id}', 'AddressController@removeAddress');

