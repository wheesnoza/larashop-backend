<?php

namespace App\Frontend\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Order\Domain\OrderRepository;
use Src\Frontend\Order\Infrastructure\Persistence\EloquentOrderRepository;

class OrderRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            OrderRepository::class,
            EloquentOrderRepository::class
        );
    }
}
