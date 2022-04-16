<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

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
