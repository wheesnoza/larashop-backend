<?php

namespace Src\Frontend\Customer\Application\Listener;

use Carbon\Carbon;
use Src\Frontend\Coupon\Domain\CouponRepository;
use Src\Frontend\Customer\Domain\CustomerCreatedDomainEvent;

class GrantWelcomeDiscountCoupon
{
    private CouponRepository $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function handle(CustomerCreatedDomainEvent $event)
    {
        $this->couponRepository
            ->grant(
                $event->customer,
                'Thanks',
                Carbon::now()->addDays(14)
            );
    }
}
