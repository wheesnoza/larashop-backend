<?php declare(strict_types=1);

namespace App\Shared\Models;

use App\Shared\Casts\SnowflakeId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Frontend\Coupon\Domain\CouponType;

final class Coupon extends Model
{
    protected $fillable = [
        'id',
        'code',
        'title',
        'description',
        'type',
        'content',
        'holding_period_start',
        'holding_period_end',
    ];

    protected $casts = [
        'id' => SnowflakeId::class,
        'type' => CouponType::class,
        'content' => 'json',
    ];

    public function customer(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, (new CustomerCoupon())->getTable());
    }

    public function getIncrementing(): bool
    {
        return false;
    }
}
