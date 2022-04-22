<?php

namespace App\Frontend\Coupon\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Coupon\Domain\CouponRepository;
use Src\Frontend\Coupon\Infrastructure\Persistence\EloquentCouponRepository;

class CouponRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CouponRepository::class,
            EloquentCouponRepository::class
        );
    }
}
