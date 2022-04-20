<?php declare(strict_types=1);

namespace Src\Frontend\Purchase\Application\Create;

use Exception;
use Src\Frontend\Auth\Domain\CustomerAuthRepository;
use Src\Frontend\Purchase\Domain\Purchase;
use Src\Frontend\Purchase\Domain\PurchasePriority;
use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Src\Frontend\Purchase\Domain\PurchaseRepository;
use Src\Frontend\Purchase\Domain\PurchaseState;
use Src\Frontend\Purchase\Domain\PurchaseUuid;
use Src\Frontend\Variant\Domain\EnsureVariantStockRepository;
use Src\Frontend\Variant\Domain\VariantUuid;
use Src\Shared\Domain\Bus\Event\EventBus;
use Src\Shared\Domain\Transaction\TransactionRepository;

final class PurchaseCreator
{
    private CustomerAuthRepository $customerAuthRepository;
    private PurchaseRepository $purchaseRepository;
    private EventBus $eventBus;
    private EnsureVariantStockRepository $ensureVariantStockRepository;
    private TransactionRepository $transactionRepository;

    public function __construct(
        CustomerAuthRepository $customerAuthRepository,
        PurchaseRepository $purchaseRepository,
        EventBus $eventBus,
        EnsureVariantStockRepository $ensureVariantStockRepository,
        TransactionRepository $transactionRepository,
    ) {
        $this->customerAuthRepository = $customerAuthRepository;
        $this->purchaseRepository = $purchaseRepository;
        $this->eventBus = $eventBus;
        $this->ensureVariantStockRepository = $ensureVariantStockRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function __invoke(array $attributes): ?Purchase
    {
        $variantUuid = new VariantUuid($attributes['variant_uuid']);
        $quantity = new PurchaseQuantity($attributes['quantity']);

        $purchase = Purchase::create(
            PurchaseUuid::generate(),
            $this->customerAuthRepository->user()->uuid(),
            $variantUuid,
            PurchaseState::Reserved,
            PurchasePriority::from($attributes['priority']),
            $quantity
        );

        $this->transactionRepository->begin();

        try {
            $stock = $this->ensureVariantStockRepository
                ->ensure($variantUuid, $quantity);

            $this->purchaseRepository
                ->save($purchase);

            $stock->reduce();

            $this->transactionRepository->commit();
        } catch (Exception $exception) {
            $this->transactionRepository->rollback();

            return null;
        }

        $this->eventBus->publish(...$purchase->pullDomainEvents());

        return $purchase;
    }
}
