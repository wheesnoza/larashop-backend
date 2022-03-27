<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

final class CustomerFactory extends Factory
{
    public function definition()
    {
        return [
            'uuid' => $this->faker->unique()->uuid(),
            'email' => $this->faker->unique()->email(),
            'password' => Hash::make('password'),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
        ];
    }
}
