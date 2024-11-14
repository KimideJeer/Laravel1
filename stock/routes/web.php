<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('stocks', [App\Http\Controllers\StockController::class, 'index']);