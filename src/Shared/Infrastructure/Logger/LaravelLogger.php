<?php declare(strict_types=1);

namespace Src\Shared\Infrastructure\Logger;

use Illuminate\Support\Facades\Log;
use Src\Shared\Domain\Logger\Logger;

final class LaravelLogger implements Logger
{
    public function critical(string $message, array $context)
    {
        Log::critical($message, $context);
    }
}
