<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
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

Route::redirect('/', '/winkel');
Route::get('/winkel', [ProductController::class, 'index'])->name('shop');

Route::get('/winkel/mandje', [OrderController::class, 'cart'])->name('cart');
Route::get('/winkel/mandje/verwijder/{key}', [OrderController::class, 'remove'])->name('cart.remove');
Route::get('/winkel/bestellen', [OrderController::class, 'order'])->name('order');
Route::post('/winkel/bestellen', [OrderController::class, 'pay'])->name('pay');
Route::get('/winkel/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/winkel/{product}', [ProductController::class, 'order'])->name('products.order');

Route::get('/bestelling/{order}/{slug}', [OrderController::class, 'show'])->name('order.show');
Route::get('/bestelling/{order}/{slug}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

Route::get('/ideal/pay/{order}', [IdealController::class, 'redirect'])->name('ideal.pay');
Route::get('/ideal/finish/{order}', [IdealController::class, 'finish'])->name('ideal.finish');
Route::get('/ideal/webhook/{order}', [IdealController::class, 'webhook']);


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    Route::redirect('/', '/admin/orders')->name('admin.home');
    Route::resource('users', UserController::class, ['as' => 'admin'])->except('show');
    Route::resource('products', AdminProductController::class, ['as' => 'admin'])->except('show');
    Route::get('products/{product}/types', [AdminProductController::class, 'types'])->name('admin.products.types');
    Route::get('products/{product}/types/create', [AdminProductController::class, 'types_create'])->name('admin.products.types.create');
    Route::post('products/{product}/types/create', [AdminProductController::class, 'types_store'])->name('admin.products.types.store');
    Route::delete('products/{product}/types/{type}', [AdminProductController::class, 'types_delete'])->name('admin.products.types.delete');

    Route::get('orders/factory', [AdminOrderController::class, 'factory'])->name('admin.orders.factory');
    Route::get('orders/mail', [AdminOrderController::class, 'mail'])->name('admin.orders.mail');
    Route::post('orders/mail', [AdminOrderController::class, 'mail_send'])->name('admin.orders.mail.send');
    Route::get('orders/packing', [AdminOrderController::class, 'packing'])->name('admin.orders.packing');
    Route::resource('orders', AdminOrderController::class, ['as' => 'admin'])->only(['index', 'show', 'destroy']);

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class, ['as' => 'admin'])->except('show');

});

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class, ['as' => 'admin'])->except('show');
Route::get('admin/categories/{category}/products', 'Admin\CategoryController@products')->name('admin.categories.products');


