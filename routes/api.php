<?php declare(strict_types=1);

use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', function () {
        return Product::all();
    });
});
