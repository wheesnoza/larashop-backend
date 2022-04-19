<?php declare(strict_types=1);

namespace Src\Frontend\Coupon\Domain;

enum CouponType: int
{
    case Discount = 1;
    case Money = 2;
}
