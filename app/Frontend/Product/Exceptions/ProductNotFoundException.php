<?php declare(strict_types=1);

namespace App\Frontend\Product\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

final class ProductNotFoundException extends Exception
{
    public function render(): JsonResponse
    {
        return response()
            ->json([
                'message' => 'Product not found.'
            ], Response::HTTP_NOT_FOUND);
    }
}
