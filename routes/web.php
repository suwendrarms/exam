<?php

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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashbord', 'HomeController@index')->name('dashbord');

    //customer
    Route::post('/customer/add', 'CustomerController@addCustomer')->name('customer.add');
    Route::post('/remove/customer', 'CustomerController@removeCustomer');
    Route::post('/update/customer', 'CustomerController@updateCustomer')->name('customer.update');

    //product
    Route::get('/product', 'ProductController@index')->name('product.home');

    //filetrs
    Route::post('/filter/printerType', 'FilterController@printerType');
    Route::post('/filter/lowestPrice', 'FilterController@lowestPrice');
    Route::post('/filter/highestPrice', 'FilterController@highestPrice');
});
