<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


route::get('/', [HomeController::class, 'home'])->name('dashboard')->middleware('cartCount');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('view_category', [AdminController::class, 'view_category']);
    Route::post('add_category', [AdminController::class, 'add_category']);
    Route::get('delete_category/{id}', [AdminController::class, 'delete_category']);
    Route::post('update_category', [AdminController::class, 'update_category']);
    // Route::get('view_category', [AdminController::class,'get_category']);
    Route::get('view_product', [AdminController::class, 'view_product']);
    Route::get('add_product', [AdminController::class, 'add_product']);
    Route::post('upload_product', [AdminController::class, 'upload_product']);
    Route::get('delete_product/{id}', [AdminController::class, 'delete_product']);
    Route::get('edit_product/{id}', [AdminController::class, 'edit_product']);
    Route::post('update_product/{id}', [AdminController::class, 'update_product']);

    Route::get('search-autocomplete', [AdminController::class, 'searchAutocomplete']);
    Route::get('product_search', [AdminController::class, 'product_search']);

    Route::get('view_order', [AdminController::class, 'view_order']);
});


Route::get('product_detail/{id}',[HomeController::class, 'product_detail'])->middleware('cartCount');

Route::get('view_cart',[HomeController::class, 'view_cart'])->middleware('cartCount');

Route::post('add_to_cart/{id}',[HomeController::class, 'addToCart']);

Route::get('remove_from_cart/{id}',[HomeController::class, 'removeFromCart']);

Route::post('order',[HomeController::class, 'view_order'])->middleware('cartCount');

Route::post('create_order',[HomeController::class, 'createOrder']);


    