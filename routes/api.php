<?php declare(strict_types=1);

use App\Frontend\Auth\Http\Controllers\AuthController;
use App\Frontend\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
});

Route::get('/products/{uuid}', [ProductController::class, 'show']);
