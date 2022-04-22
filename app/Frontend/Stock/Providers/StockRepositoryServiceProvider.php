<?php declare(strict_types=1);

namespace App\Frontend\Stock\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Stock\Domain\StockRepository;
use Src\Frontend\Stock\Infrastructure\Persistence\EloquentStockRepository;

final class StockRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            StockRepository::class,
            EloquentStockRepository::class
        );
    }
}
