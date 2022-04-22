<?php declare(strict_types=1);

namespace App\Frontend\Coupon\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Coupon\Domain\CouponRepository;
use Src\Frontend\Coupon\Infrastructure\Persistence\EloquentCouponRepository;

final class CouponRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CouponRepository::class,
            EloquentCouponRepository::class
        );
    }
}
