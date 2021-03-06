<?php declare(strict_types=1);

namespace App\Shared\Models;

use App\Shared\Casts\SnowflakeId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Src\Frontend\Customer\Domain\CustomerId;
use Src\Frontend\Order\Domain\OrderPriority;
use Src\Frontend\Order\Domain\OrderQuantity;
use Src\Frontend\Order\Domain\OrderState;
use Src\Frontend\Order\Domain\Order as DomainOrder;
use Src\Frontend\Order\Domain\OrderId;
use Src\Frontend\Variant\Domain\VariantId;

final class Order extends Model
{
    protected $fillable = [
        'id',
        'customer_id',
        'variant_id',
        'state',
        'priority',
        'quantity',
    ];

    protected $casts = [
        'id' => SnowflakeId::class,
        'customer_id' => SnowflakeId::class,
        'variant_id' => SnowflakeId::class,
        'state' => OrderState::class,
        'priority' => OrderPriority::class,
    ];

    public function variant(): HasOne
    {
        return $this->hasOne(
            Variant::class,
            'id',
            'variant_id'
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function toDomain(): DomainOrder
    {
        return new DomainOrder(
            new OrderId($this->id),
            new CustomerId($this->customer_id),
            new VariantId($this->variant_id),
            $this->state,
            $this->priority,
            new OrderQuantity($this->quantity)
        );
    }
}
