<?php

declare(strict_types=1);

namespace Tests\Frontend\Customer\Domain;

use Src\Frontend\Customer\Domain\Customer;
use Src\Frontend\Customer\Domain\CustomerEmail;
use Src\Frontend\Customer\Domain\CustomerFirstName;
use Src\Frontend\Customer\Domain\CustomerLastName;
use Src\Frontend\Customer\Domain\CustomerPassword;
use Src\Frontend\Customer\Domain\CustomerId;

final class CustomerMother
{
    public static function create(
        ?CustomerId        $uuid = null,
        ?CustomerEmail     $email = null,
        ?CustomerPassword  $password = null,
        ?CustomerFirstName $firstName = null,
        ?CustomerLastName  $lastName = null
    ): Customer {
        return new Customer(
            $uuid ?? CustomerIdMother::create(),
            $email ?? CustomerEmailMother::create(),
            $password ?? CustomerPasswordMother::create(),
            $firstName ?? CustomerFirstNameMother::create(),
            $lastName ?? MotherCustomerLastName::create()
        );
    }
}
