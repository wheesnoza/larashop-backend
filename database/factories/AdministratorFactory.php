<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Administrator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class AdministratorFactory extends Factory
{
    protected $model = Administrator::class;

    public function definition(): array
    {
        return [
            'id' => snowflake(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
