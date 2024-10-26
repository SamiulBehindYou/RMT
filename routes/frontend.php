<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Index page
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/aboutus', [FrontendController::class, 'aboutus'])->name('aboutus');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/by_category/{id}', [FrontendController::class, 'by_category'])->name('by_category');
Route::get('/by_brand/{id}', [FrontendController::class, 'by_brand'])->name('by_brand');

