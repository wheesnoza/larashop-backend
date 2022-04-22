<?php declare(strict_types=1);

namespace Src\Frontend\Order\Application\Create;

use App\Frontend\Purchase\Exceptions\NotEnoughStockException;
use Src\Frontend\Auth\Domain\CustomerAuthRepository;
use Src\Frontend\Purchase\Domain\Order;
use Src\Frontend\Purchase\Domain\OrderPriority;
use Src\Frontend\Purchase\Domain\OrderQuantity;
use Src\Frontend\Purchase\Domain\OrderRepository;
use Src\Frontend\Purchase\Domain\OrderState;
use Src\Frontend\Purchase\Domain\OrderUuid;
use Src\Frontend\Stock\Domain\StockRepository;
use Src\Frontend\Variant\Domain\VariantRepository;
use Src\Shared\Domain\Bus\Event\EventBus;
use Src\Shared\Domain\Transaction\TransactionRepository;

final class OrderCreator
{
    private CustomerAuthRepository $customerAuthRepository;
    private EventBus $eventBus;
    private OrderRepository $purchaseRepository;
    private VariantRepository $variantRepository;
    private StockRepository $stockRepository;
    private TransactionRepository $transactionRepository;

    public function __construct(
        CustomerAuthRepository $customerAuthRepository,
        OrderRepository        $purchaseRepository,
        EventBus               $eventBus,
        VariantRepository      $variantRepository,
        StockRepository        $stockRepository,
        TransactionRepository  $transactionRepository
    ) {
        $this->customerAuthRepository = $customerAuthRepository;
        $this->eventBus = $eventBus;
        $this->purchaseRepository = $purchaseRepository;
        $this->variantRepository = $variantRepository;
        $this->stockRepository = $stockRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function __invoke(array $attributes): ?Order
    {
        $variant = $this->variantRepository->find($attributes['variant_uuid']);

        $quantity = new OrderQuantity($attributes['quantity']);

        $purchase = Order::create(
            OrderUuid::generate(),
            $this->customerAuthRepository->user()->uuid(),
            $variant->uuid(),
            OrderState::Reserved,
            OrderPriority::from($attributes['priority']),
            $quantity
        );

        $this->transactionRepository
            ->begin();

        $stock = $this->stockRepository
            ->ensure($variant, $quantity);

        $this->purchaseRepository->save($purchase);

        if ($quantity->isBiggerThan($stock->count())) {
            $this->transactionRepository
                ->rollback();
            throw (new NotEnoughStockException())
                ->setVariant($variant);
        }

        $stock->reduce();

        $this->transactionRepository
            ->commit();

        $this->eventBus->publish(...$purchase->pullDomainEvents());

        return $purchase;
    }
}
