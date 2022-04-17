<?php

namespace Src\Frontend\Auth\Domain;

use Src\Frontend\Customer\Domain\Customer;

interface CustomerAuthRepository
{
    public function login(Customer $customer);

    public function user(): ?Customer;
}
