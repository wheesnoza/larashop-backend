<?php

namespace App\Frontend\Purchase\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Purchase\Domain\PurchaseRepository;
use Src\Frontend\Purchase\Infrastructure\Persistence\EloquentPurchaseRepository;

class PurchaseRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PurchaseRepository::class,
            EloquentPurchaseRepository::class
        );
    }
}
