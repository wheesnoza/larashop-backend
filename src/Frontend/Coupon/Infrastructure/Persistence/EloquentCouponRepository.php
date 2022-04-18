<?php

namespace Src\Frontend\Coupon\Infrastructure\Persistence;

use App\Shared\Models\Coupon as CouponModel;
use Src\Frontend\Coupon\Domain\CouponRepository;
use Src\Frontend\Customer\Domain\Customer;
use App\Shared\Models\Customer as CustomerModel;

class EloquentCouponRepository implements CouponRepository
{
    public function grant(Customer $customer, string $code, $expireAt): void
    {
        CustomerModel::firstWhere('uuid', $customer->uuid())
            ->coupons()
            ->sync([CouponModel::firstWhere('code', $code)->id => [
                'expire_at' => $expireAt,
            ]]);
    }
}
