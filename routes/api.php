<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\BaseController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['jwt.verify'])->group(function () {
    Route::get('transactions/index', [TransactionController::class, 'index']);
    Route::get('transactions/revenue', [TransactionController::class, 'revenue']);
    Route::get('transactions/revenue/monthly', [TransactionController::class, 'revenueMonthly']);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::fallback(function(){
    return response()->json([
        'message' => 'Route Not Found'], 404);
});
