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
/*
Route::get('/', function () {
    return view('welcome2');
});*/


Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/shop', 'ProductsController@shopPublicIndex');

Route::get('product/{id}', 'ProductsController@getProduct');

/* API */
Route::get('api', 'APIController@main');


//testing
Route::get('/edit', function () {
	if(Auth::guest()){
		return view('welcome2');
	}else{
		return view('account.edit');
	}
});

//testing
//Route::post('/change', ['uses' => 'ProductsController@changeName']);
Route::post('/change', 'ProductsController@changeName');
Route::post('/addpayment', 'PaymentController@addPaymentMethod');
Route::post('/addaddress', 'AddressController@addAddress');


Route::get('/addtocart/{product_id}', 'CartController@addToCart');
Route::get('/removefromcart/{product_id}', 'CartController@removeFromCart');



Route::get('/cart', 'CartController@getCart');



//Route::get('/account/address/add', function () {
//    return view('account.add_address');
//});


Route::get('/account', 'HomeController@getAccount');

Route::get('/account/address', 'AddressController@getAddress');
Route::get('/account/address/add', 'AddressController@addAddressView');
Route::get('/account/address/delete/{id}', 'AddressController@removeAddress');



Route::get('/account/payment', 'PaymentController@getPaymentMethods');
Route::get('/account/payment/add', 'PaymentController@addPaymentView');

Route::get('/account/payment/delete/{id}', 'PaymentController@deletePaymentMethod');

/* temporary, will eventually reference to OrderController@startProcessOrderForm */
Route::get('/process/start', 'CartController@startProcessOrderForm');

Route::post('/process/complete', 'OrderController@completeOrder');


Route::get('/account/orders', 'OrderController@returnOrderHistory');
Route::get('/account/tracking/{id}', 'OrderController@returnOrderTracking');

Route::get('/welcome', 'ProductsController@welcomePageIndex');
Route::get('/', 'ProductsController@welcomePageIndex');

