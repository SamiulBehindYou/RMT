<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Index page
Route::get('/index', [FrontendController::class, 'index'])->name('index');
