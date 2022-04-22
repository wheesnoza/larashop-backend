<?php declare(strict_types=1);

namespace App\Frontend\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Order\Domain\OrderRepository;
use Src\Frontend\Order\Infrastructure\Persistence\EloquentOrderRepository;

final class OrderRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            OrderRepository::class,
            EloquentOrderRepository::class
        );
    }
}
