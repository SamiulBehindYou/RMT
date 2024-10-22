<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Index page
Route::get('/index', [FrontendController::class, 'index'])->name('index');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php'; // All admin routes
require __DIR__.'/frontend.php'; // All frontend routes
