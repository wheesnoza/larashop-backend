<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Shared\Models\Coupon;
use App\Shared\Models\Customer;
use Database\Factories\CustomerCouponFactory;
use Illuminate\Database\Seeder;

final class CustomerCouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = new CustomerCouponFactory();

        $factory->create([
            'customer_id' => Customer::firstWhere('email', 'test@test.example')->id,
            'coupon_id' => Coupon::firstWhere('code', 'Thanks')->id,
        ]);
    }
}
