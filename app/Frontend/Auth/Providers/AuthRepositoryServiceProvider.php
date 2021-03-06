<?php declare(strict_types=1);

namespace App\Frontend\Auth\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Auth\Domain\CustomerAuthRepository;
use Src\Frontend\Auth\Infrastructure\Persistence\LaravelCustomerAuthRepository;

final class AuthRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CustomerAuthRepository::class,
            LaravelCustomerAuthRepository::class
        );
    }
}
