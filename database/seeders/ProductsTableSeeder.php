<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Variant;
use Illuminate\Database\Seeder;

final class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::factory()
            ->has(
                Variant::factory()
                    ->count(3)
                    ->has(
                        Stock::factory()
                            ->count(5)
                    )
            )
            ->count(10)
            ->create();
    }
}
