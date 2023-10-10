<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {

    return to_route("login");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/list', [App\Http\Controllers\ProductController::class, 'productList'])->name('product.list');
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'productCreate'])->name('product.create');
Route::post('/product/create/save', [App\Http\Controllers\ProductController::class, 'productCreateSave'])->name('product.create.post');
Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'productDelete'])->name('product.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
Route::post('/product/edit/save/{id}', [App\Http\Controllers\ProductController::class, 'productEditSave'])->name('product.edit.post');
Route::get('product/search', [ProductController::class, 'SearchProduct'])->name('product.search');
Route::get('/search', [ProductController::class, 'search']);
