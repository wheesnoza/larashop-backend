<?php

namespace Src\Frontend\Purchase\Domain;

enum PurchaseState: int
{
    case Reserved = 1;
    case Preparing = 2;
    case Shipped = 3;
    case Delivered = 4;
}
