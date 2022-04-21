<?php declare(strict_types=1);

namespace Src\Frontend\Purchase\Application\Create;

use Src\Frontend\Auth\Domain\CustomerAuthRepository;
use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Frontend\Purchase\Domain\BuyRepository;
use Src\Frontend\Purchase\Domain\Purchase;
use Src\Frontend\Purchase\Domain\PurchasePriority;
use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Src\Frontend\Purchase\Domain\PurchaseRepository;
use Src\Frontend\Purchase\Domain\PurchaseState;
use Src\Frontend\Purchase\Domain\PurchaseUuid;
use Src\Frontend\Variant\Domain\VariantRepository;
use Src\Frontend\Variant\Domain\VariantUuid;
use Src\Shared\Domain\Bus\Event\EventBus;

final class PurchaseCreator
{
    private CustomerAuthRepository $customerAuthRepository;
    private EventBus $eventBus;
    private BuyRepository $buyRepository;
    private PurchaseRepository $purchaseRepository;
    private VariantRepository $variantRepository;

    public function __construct(
        CustomerAuthRepository $customerAuthRepository,
        BuyRepository $buyRepository,
        PurchaseRepository $purchaseRepository,
        EventBus $eventBus,
        VariantRepository $variantRepository
    ) {
        $this->customerAuthRepository = $customerAuthRepository;
        $this->eventBus = $eventBus;
        $this->buyRepository = $buyRepository;
        $this->purchaseRepository = $purchaseRepository;
        $this->variantRepository = $variantRepository;
    }

    public function __invoke(array $attributes): ?Purchase
    {
        $variant = $this->variantRepository->find($attributes['variant_uuid']);
        $quantity = new PurchaseQuantity($attributes['quantity']);

        $purchase = Purchase::create(
            PurchaseUuid::generate(),
            new CustomerUuid('35680301-7d22-373b-84a3-7823999214bc'),
            $variant->uuid(),
            PurchaseState::Reserved,
            PurchasePriority::from($attributes['priority']),
            $quantity
        );

        $this->buyRepository->buy($variant, $quantity, function () use ($purchase) {
            $this->purchaseRepository->save($purchase);
        });

        $this->eventBus->publish(...$purchase->pullDomainEvents());

        return $purchase;
    }
}
