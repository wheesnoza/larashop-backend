<?php declare(strict_types=1);

namespace Src\Frontend\Purchase\Domain;

enum PurchasePriority: int
{
    case High = 1;
    case Medium = 2;
    case Low = 3;
}
