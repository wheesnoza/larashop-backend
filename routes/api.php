<?php declare(strict_types=1);

use App\Frontend\Auth\Http\Controllers\AuthController;
use App\Frontend\Purchase\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me/purchases', [PurchaseController::class, 'index']);
    Route::post('/purchase', [PurchaseController::class, 'store']);
});
