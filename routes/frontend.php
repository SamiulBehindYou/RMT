<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontAuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontLivewireController;
use App\Http\Controllers\MessageController;
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
    Route::get('add/cart/{id}', [CartController::class, 'add_cart'])->name('add.cart');

    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

    // Front Livewire Routes
    Route::get('cart', [FrontLivewireController::class, 'cart'])->name('cart');

    // SSLCOMMERZ Start
    Route::group(['middleware'=>[config('sslcommerz.middleware','web')]], function () {
        Route::get('/sslcommerz/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
        Route::get('/sslcommerz/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

        Route::post('/sslcommerz/pay', [SslCommerzPaymentController::class, 'index']);
        Route::post('/sslcommerz/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

        Route::post('/sslcommerz/fail', [SslCommerzPaymentController::class, 'fail']);
        Route::post('/sslcommerz/cancel', [SslCommerzPaymentController::class, 'cancel']);

        Route::post('/sslcommerz/ipn', [SslCommerzPaymentController::class, 'ipn']);
    });
    Route::post('/success', [SslCommerzPaymentController::class, 'success'])->name('sslcommerz.success');
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

