<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ShippingController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('categories', [CategoryController::class, 'index']);
Route::get('sliders', [SliderController::class, 'index']);
Route::get('get-all-hot-products', [ProductController::class, 'getAllHotProducts']);
Route::get('get-all-new-arrival-products', [ProductController::class, 'getAllNewArrivalProducts']);
Route::get('get-products-by-category/{categoryId}', [ProductController::class, 'getProductsByCategoryId']);
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('shipping', [ShippingController::class, 'store']);
Route::post('make-payment', [PaymentController::class, 'makePayment']);
