<?php declare(strict_types=1);

use App\Frontend\Auth\Http\Controllers\AuthController;
use App\Frontend\Purchase\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me/purchases', [OrderController::class, 'index']);
    Route::post('/purchase', [OrderController::class, 'store']);
});
