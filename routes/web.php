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
//route halaman depan
Route::get('/', 'HomeController@index')->name('home');
//catergory
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');
//detail - category
Route::get('/details/{id}', 'DetailController@index')->name('detail');
Route::post('/details/{id}', 'DetailController@add')->name('detail-add');

//midtrans dkk
Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');
//success belanja
Route::get('/success', 'CartController@success')->name('success');

//route auth
Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

//route group agar halaman hanya bisa diakses saat login
Route::group(['middleware' => ['auth']], function(){
    //cart
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart{id}', 'CartController@delete')->name('cart-delete');

    //temannya midtrans
    Route::post('/checkout', 'CheckoutController@process')->name('checkout');

    //route dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //dashboard product
    Route::get('/dashboard/product', 'DashboardProductController@index')->name('dashboard-product');
    Route::get('/dashboard/product/create', 'DashboardProductController@create')->name('dashboard-product-create');
    Route::post('/dashboard/product', 'DashboardProductController@store')->name('dashboard-product-store');
    Route::get('/dashboard/product/{id}', 'DashboardProductController@details')->name('dashboard-product-detail');
    //dashboard product detail
    Route::post('/dashboard/product/{id}', 'DashboardProductController@update')->name('dashboard-product-update');
    Route::post('/dashboard/product/gallery/upload', 'DashboardProductController@uploadGallery')->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/product/gallery/delete/{id}', 'DashboardProductController@deleteGallery')->name('dashboard-product-gallery-delete');
    //dashboard transaction
    Route::get('dashboard/transaction', 'DashboardTransactionController@index')->name('dashboard-transaction');
    Route::get('/dashboard/transaction/{id}', 'DashboardTransactionController@details')->name('dashboard-transaction-detail');
    Route::post('/dashboard/transaction/{id}', 'DashboardTransactionController@update')->name('dashboard-transaction-update');
    //dashboard setting
    Route::get('/dashboard/setting', 'DashboardSettingController@store')->name('dashboard-setting-store');
    Route::get('/dashboard/account', 'DashboardSettingController@account')->name('dashboard-setting-account');
    Route::post('/dashboard/account/{redirect}', 'DashboardSettingController@update')->name('dashboard-setting-redirect');
});


//route admin
Route::prefix('admin')
    ->namespace('Admin') //hanya laravel 7, ke atas jangan pakai
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'AdminDashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'AdminCategoryController');
        Route::resource('user', 'AdminUserController');
        Route::resource('product', 'AdminproductController');
        Route::resource('product-gallery', 'AdminproductGalleryController');
    });

Auth::routes();

