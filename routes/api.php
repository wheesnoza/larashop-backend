<?php declare(strict_types=1);

use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Frontend\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])
    ->name('auth.register');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-self-health', function () {
        return response()->json([
            'status' => 'ok'
        ], 200);
    });
});

Route::get('/guest-self-health', function () {
    return response()->json([
        'status' => 'ok'
    ], 200);
});
