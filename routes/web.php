<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LendingController;

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


Route::resource('products', BookController::class);

Route::resource('history', HistoryController::class);

Route::resource('lending', LendingController::class);

// Route::resource('member', AnggotaController::class);

Route::patch('/history/{history}', [HistoryController::class, 'update'])->name('history.update');
Route::put('products/{product}', [BookController::class, 'update'])->name('products.update');

