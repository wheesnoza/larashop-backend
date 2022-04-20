<?php

namespace App\Frontend\Purchase\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PurchaseFailedException extends Exception
{
    public function render(): JsonResponse
    {
        return response()
            ->json([
                'message' => 'The purchase could not be completed. Please wait and try again.'
            ], Response::HTTP_EXPECTATION_FAILED);
    }
}
