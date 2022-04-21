<?php

namespace App\Frontend\Purchase\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Src\Frontend\Variant\Domain\Variant;

class NotEnoughStockException extends Exception
{
    private Variant $variant;

    public function render(): JsonResponse
    {
        return response()
            ->json([
                'message' => "Not enough stock for product {$this->variant->name()}."
            ], Response::HTTP_EXPECTATION_FAILED);
    }

    public function setVariant(Variant $variant): self
    {
        $this->variant = $variant;

        return $this;
    }
}
