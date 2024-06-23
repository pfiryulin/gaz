<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateCategory;
use App\Http\Controllers\CreateProductType;
use App\Http\Controllers\CreateProduct;
use App\Http\Controllers\Salers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/category/list',[CreateCategory::class, 'list']);
Route::get('category/producttype/list', [CreateProductType::class, 'list']);
Route::get('category/producttype/list/{category}', [CreateProductType::class, 'categoryList']);
Route::get('product/list', [CreateProduct::class, 'list']);
Route::get('product/list/{type}', [CreateProduct::class, 'listoftype']);
Route::get('salers/list', [Salers::class, 'list']);

Route::post('/category/create',[CreateCategory::class, 'create']);
Route::post('category/producttype/create', [CreateProductType::class, 'create']);
Route::post('product/create', [CreateProduct::class, 'create']);
Route::post('salers', [Salers::class, 'sale']);
Route::post('salers/list/period', [Salers::class, 'listPeriod']);
