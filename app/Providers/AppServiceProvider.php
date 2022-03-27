<?php declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Customer\Domain\CustomerRepository;
use Src\Frontend\Customer\Infrastructure\Persistence\EloquentCustomerRepository;
use Src\Shared\Domain\Bus\Event\EventBus;
use Src\Shared\Domain\LaravelEventBus;

final class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CustomerRepository::class,
            EloquentCustomerRepository::class
        );

        $this->app->bind(
            EventBus::class,
            LaravelEventBus::class
        );
    }
}
