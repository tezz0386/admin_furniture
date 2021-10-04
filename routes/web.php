<?php

use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Setting\SiteSettingController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\user\CheckoutController;
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

Route::get('/', [FrontEndController::class, 'index'])->name('index');
Route::get('/add', [FrontEndController::class, 'addToCart'])->name('addToCart');
// to minus update
Route::post('/add', [FrontEndController::class, 'minusUpdateCart'])->name('minusUpdateCart');
Route::get('/cart', [FrontEndController::class, 'getCart'])->name('getCart');
Route::get('/contact', [FrontEndController::class, 'getContact'])->name('getContact');
Route::get('/product/{slug?}', [FrontEndController::class, 'getSingleProduct'])->name('getSingleProduct');
Route::delete('/product/{slug?}', [FrontEndController::class, 'deleteCarts'])->name('deleteCarts');

Auth::routes();
// route for users as login 
Route::group(['middleware'=>'role:user'], function(){
	Route::get('/cheeckout', [CheckoutController::class, 'getCheckout'])->name('getCheckout');
	Route::post('/cheeckout/continue', [CheckoutController::class, 'continueCheckout'])->name('continueCheckout');
	Route::get('/cheeckout/continue', [CheckoutController::class, 'postCheckout'])->name('postCheckout');
	Route::get('/cheeckout/esewa_payment_success', [CheckoutController::class, 'success'])->name('success');
	Route::get('/cheeckout/esewa_payment_error', [CheckoutController::class, 'error'])->name('error');
});
// route for admin
Route::group(['middleware' => 'role:admin', 'prefix'=>'admin'], function () {
	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);




	// web route added 
	// for site setting
	Route::get('setting', [SiteSettingController::class, 'index'])->name('sitesetting.index');
	Route::patch('setting/{siteSetting}', [SiteSettingController::class, 'update'])->name('sitesetting.update');
	Route::post('setting', [SiteSettingController::class, 'store'])->name('sitesetting.store');

	// route for category
	Route::resource('category', CategoryController::class)->except(['show']);
	// route for product
	Route::resource('product', ProductController::class);
});

Route::group(['middleware' => 'role:admin'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

