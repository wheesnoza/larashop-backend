<?php

namespace Database\Seeders;

use Database\Factories\CouponFactory;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    public function run()
    {
        $factory = new CouponFactory();

        $factory->create([
            'code' => 'Thanks',
            'title' => 'Welcome discount coupon.',
            'description' => 'Thank you for choosing us! As a thank you we give you this discount coupon for your first purchase. Enjoy!',
            'type' => 1,
            'content' => ['rate' => 0.2]
        ]);

        $factory
            ->count(4)
            ->create();
    }
}
