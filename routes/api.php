<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\ProductController;

Route::middleware(['cors'])->group(function () {
});

Route::get('/aaproducts', [ProductController::class, 'index']);
Route::post('/addproducts', [ProductController::class, 'store']);
Route::delete('/products/{id}', [ProductController::class, 'del']);
Route::get('/products/{id}', [ProductController::class, 'getProduct']);
Route::get('/aaproducts/{key}', [ProductController::class, 'search']);

