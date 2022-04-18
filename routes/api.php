<?php declare(strict_types=1);

use App\Frontend\Auth\Http\Controllers\AuthController;
use App\Shared\Models\Product;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', function () {
        return Product::all();
    });
});

