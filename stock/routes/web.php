<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('stocks', [App\Http\Controllers\StockController::class, 'index']);

Route::get('stocks/create', [App\Http\Controllers\StockController::class, 'create']);

Route::get('stocks/store', [App\Http\Controllers\StockController::class, 'store']);

Route::get('stocks/edit/{id}',   [App\Http\Controllers\StockController::class, 'edit']);

Route::post('stocks/update/{id}',   [App\Http\Controllers\StockController::class, 'update']);