<?php

namespace Database\Seeders;

use Database\Factories\AdministratorFactory;
use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{
    public function run()
    {
        $factory = new AdministratorFactory();

        $factory
            ->create([
                'email' => 'admin@test.example'
            ]);

        $factory
            ->count(9)
            ->create();
    }
}
