<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update'); //imp
    Route::post('/profile/image', [ProfileController::class, 'image_update'])->name('profile.update.image'); //imp
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Brand
    Route::get('brands', [BrandController::class, 'add_brand'])->name('brand.add');
    Route::post('brands', [BrandController::class, 'store_brand'])->name('brand.store');
    Route::get('brand/remove/{id}', [BrandController::class, 'remove_brand'])->name('brand.remove');
    Route::get('brand/btrashed/', [BrandController::class, 'trashed'])->name('brand.trash');
    Route::get('brand/restore/{id}', [BrandController::class, 'restore_brand'])->name('brand.trash.restore');
    Route::get('brand/btrashed/{id}', [BrandController::class, 'delete_trashed_brand'])->name('brand.trash.delete');


    //Category
    Route::get('category_add', [CategoryController::class, 'add_categroy'])->name('add.categroy');
    Route::post('add/categroy/store', [CategoryController::class, 'store_categroy'])->name('categroy.store');
    Route::get('categroys', [CategoryController::class, 'categroy'])->name('categroy');
    Route::get('categroy/delete/{id}', [CategoryController::class, 'delete_category'])->name('category.delete');
    Route::get('categroy/ctrashed', [CategoryController::class, 'trashed_categroy'])->name('categroy.trashed');
    Route::get('categroy/restore/{id}', [CategoryController::class, 'restore_categroy'])->name('category.trash.restore');
    Route::get('categroy/ctrashed/{id}', [CategoryController::class, 'delete_trashed_categroy'])->name('categroy.trash.delete');

    //Sub category
    Route::get('add_subcategroy', [CategoryController::class, 'add_subcategroy'])->name('add_subcategroy');
    Route::post('subcategroy/store', [CategoryController::class, 'subcategroy_store'])->name('subcategory.store');
    Route::get('sub_categroy', [CategoryController::class, 'subcategroy'])->name('subcategroy');

    // Product
    Route::resource('product', ProductController::class);
    Route::resource('tag', TagController::class);


});
