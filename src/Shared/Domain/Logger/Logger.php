<?php

namespace Src\Shared\Domain\Logger;

interface Logger
{
    public function critical(string $message, array $context);
}
