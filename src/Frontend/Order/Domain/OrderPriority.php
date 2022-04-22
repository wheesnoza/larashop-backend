<?php declare(strict_types=1);

namespace Src\Frontend\Order\Domain;

enum OrderPriority: int
{
    case High = 1;
    case Medium = 2;
    case Low = 3;
}
