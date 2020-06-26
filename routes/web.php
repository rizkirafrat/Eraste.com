<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'FrontOffice\HomeController@index')->name('home_office');
Route::get('/order/{id}', 'FrontOffice\HomeController@orders')->name('home_office');
Route::get('/order/transaction/{id}', 'FrontOffice\HomeController@transaction')->name('home_office_transction');

// Method Post
Route::post('/order/orders_process', 'FrontOffice\HomeController@orderProcess')->name('home_office_process');


// Back Office
Route::get('/admin/products', 'BackOffice\ProductsController@index')->name('backoffice_product_index');

// Auth
Route::get('BackOffice', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('BackOffice', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
