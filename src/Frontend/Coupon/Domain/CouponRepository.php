<?php declare(strict_types=1);

namespace Src\Frontend\Coupon\Domain;

use Src\Frontend\Customer\Domain\Customer;

interface CouponRepository
{
    public function grant(Customer $customer, string $code, $expireAt): void;
}
