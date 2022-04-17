<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

final class PartnerFactory extends Factory
{
    protected $model = Partner::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->unique()->uuid(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
        ];
    }
}
