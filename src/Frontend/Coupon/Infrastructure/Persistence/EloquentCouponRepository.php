<?php declare(strict_types=1);

namespace Src\Frontend\Coupon\Infrastructure\Persistence;

use App\Shared\Models\Coupon as CouponEloquentModel;
use Src\Frontend\Coupon\Domain\CouponRepository;
use Src\Frontend\Customer\Domain\Customer;
use App\Shared\Models\Customer as CustomerEloquentModel;

final class EloquentCouponRepository implements CouponRepository
{
    public function grant(Customer $customer, string $code, $expireAt): void
    {
        CustomerEloquentModel::find($customer->id())
            ->coupons()
            ->sync([CouponEloquentModel::firstWhere('code', $code)->id => [
                'expire_at' => $expireAt,
            ]]);
    }
}
