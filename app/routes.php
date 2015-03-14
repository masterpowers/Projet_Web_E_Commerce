<?php

// App::bind("Formativ\Billing\GatewayInterface", "Formativ\Billing\StripeGateway");
// App::bind("Formativ\Billing\DocumentInterface", "Formativ\Billing\PDFDocument");
// App::bind("Formativ\Billing\MessengerInterface", "Formativ\Billing\EmailMessenger");

$alphanum = '[A-Za-z]+';
Route::get("/", ["as"   => "index/index","uses" => "IndexController@indexAction"]);
Route::get('register/verify/{confirmationCode}', [ //email
    'as' => 'confirmation_path',
    'uses' => 'UsersController@confirm'
])->where('confirmation_code', $alphanum);


Route::get('users/login', 'UsersController@getLogin');
Route::post('users/login','UsersController@postLogin');

Route::get('logout','UsersController@getLogout');
Route::get('index','UsersController@index');
Route::get('admin/index','UsersController@getAdmin');
Route::resource('users','UsersController');

Route::group(['before' => 'auth'], function(){
  Route::get('account', array('uses' => 'UsersController@showAccount'));
});

Route::any("category/index", [
  "as"   => "category/index",
  "uses" => "CategoryController@indexAction"
]);

Route::any("product/index", [
  "as"   => "product/index",
  "uses" => "ProductController@indexAction"
]);

Route::any("account/authenticate", [
  "as"   => "account/authenticate",
  "uses" => "AccountController@authenticateAction"
]);

Route::any("order/index", [
  "as"   => "order/index",
  "uses" => "OrderController@indexAction"
]);

Route::any("order/add", [
  "as"   => "order/add",
  "uses" => "OrderController@addAction"
]);

Route::any("order/delete", [
  "as"   => "order/delete",
  "uses" => "OrderController@deleteAction"
]);
