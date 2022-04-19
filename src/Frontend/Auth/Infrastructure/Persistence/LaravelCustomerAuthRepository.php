<?php declare(strict_types=1);

namespace Src\Frontend\Auth\Infrastructure\Persistence;

use Illuminate\Support\Facades\Auth;
use Src\Frontend\Auth\Domain\CustomerAuthRepository;
use Src\Frontend\Customer\Domain\Customer;
use App\Shared\Models\Customer as CustomerModel;

final class LaravelCustomerAuthRepository implements CustomerAuthRepository
{
    public function login(Customer $customer)
    {
        $customerModel = CustomerModel::firstWhere(
            'uuid',
            $customer->uuid()->value()
        );

        Auth::guard('customer')
            ->login($customerModel);
    }

    public function user(): ?Customer
    {
        return Auth::guard('customer')
            ->user()
            ?->toDomain();
    }
}
