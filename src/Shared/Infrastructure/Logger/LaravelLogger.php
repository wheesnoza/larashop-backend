<?php

namespace Src\Shared\Infrastructure\Logger;

use Illuminate\Support\Facades\Log;
use Src\Shared\Domain\Logger\Logger;

class LaravelLogger implements Logger
{
    public function critical(string $message, array $context)
    {
        Log::critical($message, $context);
    }
}
