<?php declare(strict_types=1);

namespace App\Frontend\Stock\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Frontend\Stock\Domain\StockCountRepository;
use Src\Frontend\Stock\Infrastructure\Persistence\EloquentStockCountRepository;
use Src\Frontend\Stock\Infrastructure\Persistence\RedisStockCountRepository;

final class StockRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            StockCountRepository::class,
            RedisStockCountRepository::class
        );
    }
}
