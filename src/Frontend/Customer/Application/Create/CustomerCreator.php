<?php

declare(strict_types=1);

namespace Src\Frontend\Customer\Application\Create;

use Exception;
use Src\Frontend\Customer\Domain\Customer;
use Src\Frontend\Customer\Domain\CustomerEmail;
use Src\Frontend\Customer\Domain\CustomerFirstName;
use Src\Frontend\Customer\Domain\CustomerLastName;
use Src\Frontend\Customer\Domain\CustomerPassword;
use Src\Frontend\Customer\Domain\CustomerRepository;
use Src\Frontend\Customer\Domain\CustomerId;
use Src\Shared\Domain\Bus\Event\EventBus;
use Src\Shared\Domain\Transaction\TransactionRepository;

final class CustomerCreator
{
    private CustomerRepository $customerRepository;
    private EventBus $bus;
    private TransactionRepository $transactionRepository;

    public function __construct(CustomerRepository $customerRepository, EventBus $bus, TransactionRepository $transactionRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->bus = $bus;
        $this->transactionRepository = $transactionRepository;
    }

    public function __invoke(array $attributes): Customer
    {
        $customer = Customer::create(
            CustomerId::generate(),
            new CustomerEmail($attributes['email']),
            new CustomerPassword($attributes['password']),
            new CustomerFirstName($attributes['first_name']),
            new CustomerLastName($attributes['last_name']),
        );

        $this->transactionRepository
            ->begin();

        try {
            $this->customerRepository
                ->save($customer);

            $this->bus->publish(...$customer->pullDomainEvents());

            $this->transactionRepository
                ->commit();

            return $customer;
        } catch (Exception $exception) {
            $this->transactionRepository
                ->rollback();

            abort(500, $exception->getMessage());
        }
    }
}
