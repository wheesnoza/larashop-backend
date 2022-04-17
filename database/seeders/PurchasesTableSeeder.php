<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Shared\Models\Customer;
use Database\Factories\PurchaseFactory;
use Illuminate\Database\Seeder;

final class PurchasesTableSeeder extends Seeder
{
    public function run()
    {
        $factory = new PurchaseFactory();

        $factory
            ->create([
                'customer_id' => Customer::firstWhere('email', 'test@test.example')->id
            ]);
    }
}
