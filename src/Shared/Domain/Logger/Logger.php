<?php declare(strict_types=1);

namespace Src\Shared\Domain\Logger;

interface Logger
{
    public function critical(string $message, array $context);
}
