<?php declare(strict_types=1);

namespace App\Frontend\Order\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Src\Frontend\Variant\Domain\Variant;

final class NotEnoughStockException extends Exception
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
