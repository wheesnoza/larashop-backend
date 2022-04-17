<?php declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\ProductFactory;
use Database\Factories\StockFactory;
use Database\Factories\VariantFactory;
use Illuminate\Database\Seeder;

final class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $factory = new ProductFactory();

        $factory
            ->has(
                (new VariantFactory())
                    ->count(3)
                    ->has(
                        (new StockFactory())
                            ->count(5)
                    )
            )
            ->count(10)
            ->create();
    }
}
