<?php declare(strict_types=1);

namespace App\Shared\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Src\Frontend\Customer\Domain\CustomerRepository;
use Src\Frontend\Customer\Infrastructure\Persistence\EloquentCustomerRepository;
use Src\Shared\Domain\Bus\Event\EventBus;
use Src\Shared\Domain\Transaction\TransactionRepository;
use Src\Shared\Infrastructure\Bus\Event\LaravelEventBus;
use Src\Shared\Infrastructure\Transaction\LaravelTransactionRepository;

final class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CustomerRepository::class,
            EloquentCustomerRepository::class
        );

        $this->app->bind(
            TransactionRepository::class,
            LaravelTransactionRepository::class
        );

        $this->app->bind(
            EventBus::class,
            LaravelEventBus::class
        );

        Sanctum::ignoreMigrations();
    }
}
