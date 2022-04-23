<?php declare(strict_types=1);

namespace App\Frontend\Order\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Src\Frontend\Order\Domain\Order;

final class NotEnoughStockException extends Exception
{
    private Order $order;

    public function render(): JsonResponse
    {
        return response()
            ->json([
                'message' => "Not enough stock for next product: {$this->order->variantid()}."
            ], Response::HTTP_EXPECTATION_FAILED);
    }

    public function setOrder(Order $order): self
    {
        $this->order = $order;

        return $this;
    }
}
