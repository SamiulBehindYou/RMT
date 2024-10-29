<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LiveWireRoutesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->group(function () {

    // Admin Dashbaord
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

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
    Route::get('subcategroy/delete/{id}', [CategoryController::class, 'delete_subcategory'])->name('subcategory.delete');
    Route::get('sub_categroy/subtrash', [CategoryController::class, 'subcategroy_trash'])->name('subcategroy.trash');
    Route::get('subcategroy/restore/{id}', [CategoryController::class, 'restore_subcategroy'])->name('subcategory.trash.restore');
    Route::get('subcategroy/subtrashed/{id}', [CategoryController::class, 'delete_trashed_subcategroy'])->name('subcategroy.trash.delete');

    // Product
    Route::resource('product', ProductController::class);
    Route::get('product/delete/{id}', [ProductController::class, 'delete_product'])->name('product.delete');
    Route::get('ptrashed', [ProductController::class, 'view_trash'])->name('product.trash');
    Route::get('permanant/product/restore/{id}', [ProductController::class, 'restore_product'])->name('restore.product');
    Route::get('permanant/product/delete/{id}', [ProductController::class, 'per_delete_product'])->name('product.per.delete');

    // Customers
    Route::get('customers', [CustomerController::class, 'customers'])->name('customers');
    Route::get('suspend/{id}', [CustomerController::class, 'suspend'])->name('suspend');

    // Message
    Route::get('view/message', [MessageController::class, 'view_message'])->name('view.message');
    Route::get('single_message/{id}', [MessageController::class, 'single_message'])->name('single.message');


    // LiveWire
        // Tag
        Route::get('tag', [LiveWireRoutesController::class, 'tag_index'])->name('tag.index');

        // Color&Size
        Route::get('color_size', [LiveWireRoutesController::class, 'color_size'])->name('color.size');

        // Inventory
        Route::get('inventory', [LiveWireRoutesController::class, 'inventory'])->name('inventory');

        // Sales & invoice
        Route::get('sales/offline', [LiveWireRoutesController::class, 'offline_sales'])->name('sales.offline');
        Route::get('sales/online', [LiveWireRoutesController::class, 'online_sales'])->name('sales.online');
        Route::get('viewInvoice', [LiveWireRoutesController::class, 'view_invoice'])->name('viewInvoice');
        Route::get('invoiceTrash', [LiveWireRoutesController::class, 'invoice_trash'])->name('invoice.trash');


        // PDF
        Route::post('pdf/', [LiveWireRoutesController::class, 'pdf'])->name('pdf');

        Route::get('test', function(){
            return view('admin.test');
        });

        // Coupon
        Route::get('coupon', [LiveWireRoutesController::class, 'coupon_index'])->name('coupon.index');

});
