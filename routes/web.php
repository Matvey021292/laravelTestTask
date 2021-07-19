<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $orders = Order::all();
    return view('welcome', compact('orders'));
})->name('home');


Route::get('/sorry{params?}', function () {
    return view('sorry');
})->name('sorry');

Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank-you');
