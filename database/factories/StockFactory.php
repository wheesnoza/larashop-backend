<?php declare(strict_types=1);

namespace Database\Factories;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

final class StockFactory extends Factory
{
    public function definition(): array
    {
        return [
            'variant_id' => Variant::factory(),
        ];
    }
}
