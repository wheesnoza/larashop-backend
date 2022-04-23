<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

final class StockFactory extends Factory
{
    protected $model = Stock::class;

    public function definition(): array
    {
        return [
            'id' => snowflake(),
            'variant_id' => new VariantFactory(),
        ];
    }
}
