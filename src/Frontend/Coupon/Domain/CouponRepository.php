<?php

namespace Src\Frontend\Coupon\Domain;

use Src\Frontend\Customer\Domain\Customer;

interface CouponRepository
{
    public function grant(Customer $customer, string $code, $expireAt): void;
}
