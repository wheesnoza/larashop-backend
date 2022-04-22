<?php declare(strict_types=1);

namespace Src\Frontend\Purchase\Application\Create;

use App\Frontend\Purchase\Exceptions\NotEnoughStockException;
use Src\Frontend\Auth\Domain\CustomerAuthRepository;
use Src\Frontend\Purchase\Domain\Purchase;
use Src\Frontend\Purchase\Domain\PurchasePriority;
use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Src\Frontend\Purchase\Domain\PurchaseRepository;
use Src\Frontend\Purchase\Domain\PurchaseState;
use Src\Frontend\Purchase\Domain\PurchaseUuid;
use Src\Frontend\Stock\Domain\StockRepository;
use Src\Frontend\Variant\Domain\VariantRepository;
use Src\Shared\Domain\Bus\Event\EventBus;
use Src\Shared\Domain\Transaction\TransactionRepository;

final class PurchaseCreator
{
    private CustomerAuthRepository $customerAuthRepository;
    private EventBus $eventBus;
    private PurchaseRepository $purchaseRepository;
    private VariantRepository $variantRepository;
    private StockRepository $stockRepository;
    private TransactionRepository $transactionRepository;

    public function __construct(
        CustomerAuthRepository $customerAuthRepository,
        PurchaseRepository $purchaseRepository,
        EventBus $eventBus,
        VariantRepository $variantRepository,
        StockRepository $stockRepository,
        TransactionRepository $transactionRepository
    ) {
        $this->customerAuthRepository = $customerAuthRepository;
        $this->eventBus = $eventBus;
        $this->purchaseRepository = $purchaseRepository;
        $this->variantRepository = $variantRepository;
        $this->stockRepository = $stockRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function __invoke(array $attributes): ?Purchase
    {
        $variant = $this->variantRepository->find($attributes['variant_uuid']);

        $quantity = new PurchaseQuantity($attributes['quantity']);

        $purchase = Purchase::create(
            PurchaseUuid::generate(),
            $this->customerAuthRepository->user()->uuid(),
            $variant->uuid(),
            PurchaseState::Reserved,
            PurchasePriority::from($attributes['priority']),
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
