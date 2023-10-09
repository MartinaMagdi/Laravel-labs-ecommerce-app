<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\productsController;
use App\Http\Controllers\CategoryController;

Route::get('/', [productsController::class, "getAllProducts"])->name('products');
Route::get('/product/create', [productsController::class, "createProduct"])->name('product.create');
Route::get('/product/{id}', [productsController::class, "getProductById"])->name('product.show');
Route::get('/product/{id}/delete', [productsController::class, "deleteProductById"])->name('product.destroy');
Route::get('/product/{id}/edit', [productsController::class, "updateProductById"])->name('product.update');
Route::post('/product/{id}/update', [productsController::class, "storeEditProductById"])->name('product.storeEdit');
Route::post('/products', [productsController::class, "store"])->name('products.store');

Route::resource("categories", CategoryController::class);

// Route::resource('categories', CategoryController::class)->middleware(['auth', 'except' => ['create']]);

Route::get('/about-us', function () {
    return view("about-us");
});

Route::get('/contact-us', function () {
    return view("contact-us");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
