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
Route::get('/admin/products', 'BackOffice\ProductsController@index')->name('backoffice_product.index');
Route::get('/admin/products/create', 'BackOffice\ProductsController@formProduct')->name('backoffice_product_create');
Route::get('/admin/products/update/{id}', 'BackOffice\ProductsController@formProduct')->name('backoffice_product_create');
Route::get('/admin/products/delete/{id}', 'BackOffice\ProductsController@deleteProduct')->name('backoffice_product_delete');

Route::post('/admin/products/process_form', 'BackOffice\ProductsController@processForm')->name('back_office_process');


Route::get('/admin/orders', 'BackOffice\OrdersController@index')->name('backoffice_orders_index');
Route::get('/admin/orders/update/{id}', 'BackOffice\OrdersController@formOrders')->name('backoffice_orders_create');
Route::get('/admin/orders/delete/{id}', 'BackOffice\OrdersController@deleteOrders')->name('backoffice_orders_delete');

Route::post('/admin/orders/process_form', 'BackOffice\OrdersController@processForm')->name('back_office_process');

Route::get('/admin/customers', 'BackOffice\CustomersController@index')->name('backoffice_customers_index');
Route::get('/admin/customers/update/{id}', 'BackOffice\CustomersController@formCustomers')->name('backoffice_customers_create');
Route::get('/admin/customers/delete/{id}', 'BackOffice\CustomersController@deleteCustomers')->name('backoffice_customers_delete');

Route::post('/admin/customers/process_form', 'BackOffice\CustomersController@processForm')->name('back_office_process');



// Auth
Route::get('BackOffice', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('BackOffice', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
