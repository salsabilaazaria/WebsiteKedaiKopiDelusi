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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('role:admin')->get('/dashboard', 'HomeController@index')->name('dashboard');
Route::middleware('role:user')->get('/dashboard', 'DetailController@index')->name('dashboard');

//welcome.blade.php
Route::get('/', 'WelcomeController@welcome')->name('welcome');;

//order.blade.php
Route::get('/order', 'WelcomeController@product')->name('order');;

//detail.blade.php
Route::get('/ProductDetails/{id}', 'DetailController@productdetail');

//category.blade.php
Route::get('/Category/{id}', 'PageController@category');

// cartpage.blade.php
Route::get('/cart', 'DetailController@cart')->name('getcart');
// cartpage.blade.php nambahin product ke cart
Route::get('/addtocart/{id}', 'DetailController@getAddToCart')->name('addtocartproduct');
// cartpage.blade.php ngapus product di cart
Route::get('/removeitem/{id}', 'DetailController@removeitem');
// cartpage.blade.php update qt di cart
Route::get('/updateitem/{id}', 'DetailController@updateitem')->name('update');

// checkout.blade.php 
Route::get('/checkout', 'DetailController@getcheckout')->name('checkout');
//masukin cart ke order
Route::post('/postcheckout', 'DetailController@postcheckout')->name('postcheckout');

//profile.blade.php
Route::get('/profile', 'PageController@getprofile');

//search.blade.php
Route::get('/search', 'PageController@search')->name('search');



//ADMIN ROUTE 
//adminpanel.blade.php
Route::middleware('role:admin')->get('/admin_dashboard', 'Admin\DashboardController@index')->name('admin_dashboard');

//productcreat.blade.php
Route::get('/add_product_show', 'ProductsController@create');
//productcreat.blade.php buat naro product ke database
Route::post('/add_product', 'ProductsController@store');

//productshow.blade.php
Route::get('/show_products','ProductsController@index');
//productshow.blade.php buat delete product
Route::get('/delete_product/{id}','ProductsController@deleteProduct');



//categorycreate.blade.php
Route::get('/add_category_show', 'CategoriesController@create');
//categorycreate.blade.php buat naro kategori ke database
Route::post('/add_category', 'CategoriesController@store');

//categoryshow.blade.php
Route::get('/show_categories', 'CategoriesController@index');

