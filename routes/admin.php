<?php

use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\brandController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\taxController;
use App\Models\attribute;
use Illuminate\Support\Facades\Route;






Route::get('/dashboard', function () {
    return view('admin/index');
});

// Profile Section
Route::get('/profile', [profileController::class, 'index'])->name('user.profile');
Route::post('/saveProfile', [profileController::class, 'store'])->name('save.profile');


// Home Banner
Route::get('/home_banner', [HomeBannerController::class, 'index'])->name('home.banner');
Route::post('/add/home_banner', [HomeBannerController::class, 'store'])->name('add.home.banner');

// Sizes
Route::get('/manage_size', [SizeController::class, 'index'])->name('admin.manage_size');
Route::post('/add/manage_size', [SizeController::class, 'store'])->name('add.manage_size');

// Color
Route::get('/manage_color', [ColorController::class, 'index'])->name('admin.manage_color');
Route::post('/add/manage_color', [ColorController::class, 'store'])->name('add.manage_color');

// Attributes Nme
Route::get('/attributes_name', [AttributesController::class, 'index_attributes_name'])->name('admin.attributes_name');
Route::post('/add/attributes_name', [AttributesController::class, 'store_attributes_name'])->name('add.attributes_name');
// Attributes Value
Route::get('/attributes_value', [AttributesController::class, 'index_attributes_value'])->name('admin.attributes_value');
Route::post('/add/attributes_value', [AttributesController::class, 'store_attributes_value'])->name('add.attributes_value');

// Category
Route::get('/category', [categoryController::class, 'index_category_name'])->name('admin.category_name');
Route::post('/add/category', [categoryController::class, 'store_category_name'])->name('add.category_name');

// Category Attributes
Route::get('/category_attribute', [categoryController::class, 'index_category_attribute'])->name('admin.category_attribute');
Route::post('/add/category_attribute', [categoryController::class, 'store_category_attribute'])->name('add.category_attribute');


// Brands
Route::get('/brands', [brandController::class, 'index'])->name('admin.brands');
Route::post('/add/brands', [brandController::class, 'store'])->name('add.brands');


// Tax
Route::get('/tax', [taxController::class, 'index'])->name('admin.tax');
Route::post('/add/tax', [taxController::class, 'store'])->name('add.tax');



// Tax
Route::get('/product', [productController::class, 'index'])->name('admin.product');
Route::get('/manage_product/{id?}', [productController::class, 'view_product'])->name('admin.view_product');
Route::post('/add/tax', [productController::class, 'store'])->name('add.tax');
Route::post('/getAttribute', [ProductController::class, 'getAttribute'])->name('add.getAttribute');



// Global Delete Route
Route::get('/deleteData/{id}/{table?}', [HomeBannerController::class, 'deleteData'])->name('deleteData.home.banner');
