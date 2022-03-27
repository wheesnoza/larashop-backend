<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

final class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        Customer::factory()
            ->create([
                'email' => 'test@test.example'
            ]);

        Customer::factory()
            ->count(9)
            ->create();
    }
}
