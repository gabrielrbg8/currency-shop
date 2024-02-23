<?php

use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Transaction\TransactionController;

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
Route::middleware('jwt')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('transactions', TransactionController::class);
    Route::get('/currencies/{fromCurrency}/{toCurrency}', [CurrencyController::class, 'index']);
});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

