<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purchase::factory()
            ->create([
                'customer_id' => Customer::firstWhere('email', 'test@test.example')->id
            ]);
    }
}
