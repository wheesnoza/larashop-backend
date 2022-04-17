<?php declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\CustomerFactory;
use Illuminate\Database\Seeder;

final class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        $factory = new CustomerFactory();

        $factory->create([
            'email' => 'test@test.example'
        ]);

        $factory
            ->count(9)
            ->create();
    }
}
