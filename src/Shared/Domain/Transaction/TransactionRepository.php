<?php

namespace Src\Shared\Domain\Transaction;

interface TransactionRepository
{
    public function begin(): void;

    public function rollback(): void;

    public function commit(): void;
}
