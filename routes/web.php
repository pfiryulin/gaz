<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateCategory;
use App\Http\Controllers\CreateProductType;
use App\Http\Controllers\CreateProduct;

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
    return view('welcome');
});

Route::get('category/create', [CreateCategory::class, 'create']);
Route::get('category/producttype/create', [CreateProductType::class, 'create']);
Route::get('product/create', [CreateProduct::class, 'create']);
