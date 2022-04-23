<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Snowflake\SnowflakeCast;

final class CustomerCoupon extends Model
{
    protected $fillable = [
        'id',
        'customer_id',
        'coupon_id',
        'expire_at'
    ];

    protected $casts = [
        'id' => SnowflakeCast::class,
        'customer_id' => SnowflakeCast::class,
        'coupon_id' => SnowflakeCast::class,
    ];

    public function getIncrementing(): bool
    {
        return false;
    }
}
