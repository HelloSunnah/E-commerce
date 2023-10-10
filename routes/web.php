<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

//oder

Route::get('/Order/onhold/list', [App\Http\Controllers\OrderController::class, 'onholdList'])->name('onhold.list');
Route::get('/Order/processing/list', [App\Http\Controllers\OrderController::class, 'processingList'])->name('processing.list');
Route::get('/Order/complete/list', [App\Http\Controllers\OrderController::class, 'CompleteList'])->name('complete.list');

//for order Status Changing
Route::get('/Order/processing/status/{id}', [App\Http\Controllers\OrderController::class, 'processing_Status'])->name('processing.status');
Route::get('/Order/complete/status/{id}', [App\Http\Controllers\OrderController::class, 'Complete_Status'])->name('complete.status');


//for fething api setup
Route::get('/search', [ProductController::class, 'search']);
