<?php declare(strict_types=1);

namespace App\Frontend\Product\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Product\Domain\ProductRepository;
use Src\Frontend\Product\Infrastructure\Persistence\EloquentProductRepository;

final class ProductRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ProductRepository::class,
            EloquentProductRepository::class
        );
    }
}
