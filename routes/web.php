<?php

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

Route::get('/', function () {
    return view('homepage', ['commodities' => []]);
});

Route::get('/user/login', function () {
    return view('login');
});

Route::get('/user/register', function () {
    return view('register');
});

Route::get('/user/profile', function () {
    return view('profile');
});

Route::get('/user/resetPassword', function () {
    return view('resetPassword');
});

Route::get('/user/changePassword', function () {
    return view('changePassword');
});

Route::get('/commodity/{id}', function () {
    return view('commodity');
});

Route::get('/user/cart', function () {
    return view('cart');
});

Route::get('/user/checkout', function () {
    return view('checkout');
});
