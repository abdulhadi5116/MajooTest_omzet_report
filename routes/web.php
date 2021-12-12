<?php

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
    return redirect('/home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('merchants', [App\Http\Controllers\MerchantController::class, 'index'])->name('merchants.index');
    Route::get('transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/revenue', [App\Http\Controllers\TransactionController::class, 'revenue'])->name('transactions.revenue');
    Route::get('transactions/revenue/monthly', [App\Http\Controllers\TransactionController::class, 'revenueMonthly'])->name('transactions.revenue.monthly');
});