<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VaicheleController;
use App\Http\Controllers\Admin\AdminController;

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');



    Route::group(
        [
            'middleware' => 'is_Admin',
            'prefix' => 'admin',
            'as' => 'admin.'
        ],
        function () {
            Route::resource('users', AdminController::class);
        }
    );
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('goods', GoodController::class);
    Route::resource('vaicheles', VaicheleController::class);
    Route::get('orders/edit/{id}', [OrderController::class, 'change'])->name('orders/edit');
    Route::resource('orders', OrderController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('shops', ShopController::class);
    Route::get('invoices/create/{product_name}',[InvoiceController::class, 'createInvoice'])->name('invoice/create');
    Route::get('invoices/createPdf',[InvoiceController::class,'createInvoicePdf'])->name('invoicepdf');
     Route::resource('invoices', InvoiceController::class);
});
