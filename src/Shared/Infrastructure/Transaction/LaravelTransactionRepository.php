<?php

namespace Src\Shared\Infrastructure\Transaction;

use Illuminate\Support\Facades\DB;
use Src\Shared\Domain\Transaction\TransactionRepository;

class LaravelTransactionRepository implements TransactionRepository
{
    public function begin(): void
    {
        DB::beginTransaction();
    }

    public function rollback(): void
    {
        DB::rollBack();
    }

    public function commit(): void
    {
        DB::commit();
    }
}
