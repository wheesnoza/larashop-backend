<?php declare(strict_types=1);

namespace App\Shared\Models;

use App\Shared\Casts\SnowflakeId;
use Illuminate\Database\Eloquent\Model;

final class CustomerCoupon extends Model
{
    protected $fillable = [
        'id',
        'customer_id',
        'coupon_id',
        'expire_at'
    ];

    protected $casts = [
        'id' => SnowflakeId::class,
        'customer_id' => SnowflakeId::class,
        'coupon_id' => SnowflakeId::class,
    ];

    public function getIncrementing(): bool
    {
        return false;
    }
}
