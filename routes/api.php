<?php

use App\Http\Controllers\OrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('orders',[OrdersController::class,"index"]);
Route::post('orders',[OrdersController::class,"register"]);
Route::put('orders/{id}',[OrdersController::class,"update"]);
Route::delete('orders/{id}',[OrdersController::class,"delete"]);