<?php

declare(strict_types=1);

namespace Src\Frontend\Customer\Domain;

use Src\Shared\Domain\Aggregate\DomainEventAggregateRoot;

final class Customer extends DomainEventAggregateRoot
{
    private CustomerId $id;
    private CustomerEmail $email;
    private CustomerPassword $password;
    private CustomerFirstName $firstName;
    private CustomerLastName $lastName;

    public function __construct(
        CustomerId        $id,
        CustomerEmail     $email,
        CustomerPassword  $password,
        CustomerFirstName $firstName,
        CustomerLastName  $lastName
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public static function create(
        CustomerId        $id,
        CustomerEmail     $email,
        CustomerPassword  $password,
        CustomerFirstName $firstName,
        CustomerLastName  $lastName
    ): self {
        $customer = new self($id, $email, $password, $firstName, $lastName);

        $customer->record(new CustomerCreatedDomainEvent($customer));

        return $customer;
    }

    public function id(): CustomerId
    {
        return $this->id;
    }

    public function email(): CustomerEmail
    {
        return $this->email;
    }

    public function password(): CustomerPassword
    {
        return $this->password;
    }

    public function firstName(): CustomerFirstName
    {
        return $this->firstName;
    }

    public function lastName(): CustomerLastName
    {
        return $this->lastName;
    }

    public function fullName(): string
    {
        return sprintf(
            "%s %s",
            $this->firstName(),
            $this->lastName()
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id()->value(),
            'email' => $this->email()->value(),
            'password' => $this->password()->value(),
            'first_name' => $this->firstName()->value(),
            'last_name' => $this->lastName()->value(),
        ];
    }
}
