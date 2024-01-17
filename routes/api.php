<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommodityController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

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

Route::post('/user/login', [UserController::class, 'login']);

Route::post('/user/logout', [UserController::class, 'logout']);

Route::post('/user/register', [UserController::class, 'register']);

Route::post('/coupon/creat', [CouponController::class, 'creatCoupon']);

Route::post('commodity/addToCart', [CartController::class, 'addToCart']);

Route::post('/order/create', [OrderController::class, 'createOrder']);

Route::post('/user/order', [OrderController::class, 'createOrder']);

Route::patch('/user/profile', [UserController::class, 'editProfile']);

Route::patch('/user/resetPassword', [UserController::class, 'resetPassword']);

Route::patch('/user/changePassword', [UserController::class, 'changePassword']);

Route::patch('/user/cart/updateItem', [CartController::class, 'updateItem']);

Route::patch('/user/cart/updateItems', [CartController::class, 'updateItems']);

Route::get('/user/profile', [UserController::class, 'getProfile']);

Route::get('/user/coupon', [CouponController::class, 'getCoupon']);

// Route::get('/getCommodities', [CommodityController::class, 'getCommodities']);

Route::get('/commodities', [CommodityController::class, 'getCommodities']);

// new commodity api
Route::get('/commodity/{id}', [CommodityController::class, 'getCommodity']);

// old commodity api
// Route::get('/commodity', [CommodityController::class, 'commodity']);

Route::get('/user/orderList', [OrderController::class, 'getOrderList']);

Route::get('user/orders', [OrderController::class, 'getOrderList']);

// Route::get('/user/orderDetail', [OrderController::class, 'getOrderDetail']);

Route::get('/user/order/{id}', [OrderController::class, 'getOrderDetail']);

Route::get('/user/cart', [CartController::class, 'getItems']);

Route::get('/user/cart/count', [CartController::class, 'countPrice']);

Route::get('/user/checkout', [CheckoutController::class, 'getItems']);

Route::delete('/user/cart/deleteItem', [CartController::class, 'deleteFromCart']);

Route::get('/user/orders/test', [OrderController::class, 'test']);
