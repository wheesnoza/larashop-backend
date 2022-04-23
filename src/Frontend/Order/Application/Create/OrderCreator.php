<?php declare(strict_types=1);

namespace Src\Frontend\Order\Application\Create;

use Src\Frontend\Auth\Domain\CustomerAuthRepository;
use Src\Frontend\Order\Domain\BuyRepository;
use Src\Frontend\Order\Domain\Order;
use Src\Frontend\Order\Domain\OrderPriority;
use Src\Frontend\Order\Domain\OrderQuantity;
use Src\Frontend\Order\Domain\OrderState;
use Src\Frontend\Order\Domain\OrderId;
use Src\Frontend\Variant\Domain\VariantId;
use Src\Shared\Domain\Bus\Event\EventBus;

final class OrderCreator
{
    private CustomerAuthRepository $customerAuthRepository;
    private EventBus $eventBus;
    private BuyRepository $buyRepository;

    public function __construct(
        CustomerAuthRepository $customerAuthRepository,
        BuyRepository $buyRepository,
        EventBus $eventBus,
    ) {
        $this->customerAuthRepository = $customerAuthRepository;
        $this->eventBus = $eventBus;
        $this->buyRepository = $buyRepository;
    }

    public function __invoke(array $attributes): Order
    {
        $order = Order::create(
            OrderId::generate(),
            $this->customerAuthRepository->user()->uuid(),
            new VariantId($attributes['variant_uuid']),
            OrderState::Reserved,
            OrderPriority::from($attributes['priority']),
            new OrderQuantity($attributes['quantity'])
        );

        $this->buyRepository->buy($order);

        $this->eventBus->publish(...$order->pullDomainEvents());

        return $order;
    }
}
