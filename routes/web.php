<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Index page 
Route::get('/', [FrontendController::class, 'index'])->name('index');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/frontend.php';
