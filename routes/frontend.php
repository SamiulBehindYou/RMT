<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontAuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontLivewireController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Index page
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/repair/view', [FrontendController::class, 'view_repair'])->name('view.repair');
Route::get('/aboutus', [FrontendController::class, 'aboutus'])->name('aboutus');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
// Message
Route::get('/contact', [MessageController::class, 'contact'])->name('contact');
Route::post('/message', [MessageController::class, 'store_message'])->name('message.store');
Route::get('/by_category/{id}', [FrontendController::class, 'by_category'])->name('by_category');
Route::get('/by_brand/{id}', [FrontendController::class, 'by_brand'])->name('by_brand');
Route::get('/single_product/{id}', [FrontendController::class, 'single_product'])->name('single_product');

Route::get('customer/login', [FrontAuthController::class, 'login'])->name('customer.login');
Route::get('customer/register', [FrontAuthController::class, 'register'])->name('customer.register');
Route::post('customer/register', [FrontAuthController::class, 'register_store'])->name('register.store');
Route::post('customer/login', [FrontAuthController::class, 'customer_login'])->name('login.store');


Route::middleware('customer')->group(function(){
    // customer profile
    Route::get('customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::post('customer/update', [FrontAuthController::class, 'update'])->name('customer.profile.update');
    Route::get('customer/logout', [FrontAuthController::class, 'logout'])->name('customer.logout');

    Route::controller(CartController::class)->group(function(){

        Route::get('add/cart/{id}', 'add_cart')->name('add.cart');
        Route::get('checkout', 'checkout')->name('checkout');
    });

    // Order
    Route::controller(OrderController::class)->group(function(){
        Route::get('orders', 'orders')->name('orders');
    });

    // Front Livewire Routes
    Route::get('cart', [FrontLivewireController::class, 'cart'])->name('cart');

    // SSLCOMMERZ Start
    Route::controller(SslCommerzPaymentController::class)
    // ->group(['middleware'=>[config('sslcommerz.middleware','web')]],
    ->middleware([config('sslcommerz.middleware','web')])
    ->group(function () {
        Route::get('/sslcommerz/example1', 'exampleEasyCheckout');
        Route::get('/sslcommerz/example2', 'exampleHostedCheckout');

        Route::post('/sslcommerz/pay', 'index');
        Route::post('/sslcommerz/pay-via-ajax', 'payViaAjax');

        Route::post('/sslcommerz/fail', 'fail');
        Route::post('/sslcommerz/cancel', 'cancel');

        Route::post('/sslcommerz/ipn', 'ipn');
        Route::post('/success', 'success')->name('sslcommerz.success');
    });
    //SSLCOMMERZ END


});


// Custom command
Route::get('dev/{type}/{command}', function($type, $command){
    if($type == 'command'){
        Artisan::call($command);
        return Artisan::output();
    }else if($type == 'table'){
        return DB::table($command)->get();
    }else{
        return 'Invalid command';
    }
})->name('dev.command');

