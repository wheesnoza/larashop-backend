<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Frontend\Order\Domain\OrderPriority;
use Src\Frontend\Order\Domain\OrderQuantity;
use Src\Frontend\Order\Domain\OrderState;
use Src\Frontend\Order\Domain\Order as DomainOrder;
use Src\Frontend\Order\Domain\OrderUuid;
use Src\Frontend\Variant\Domain\VariantUuid;

final class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'variant_id',
        'uuid',
        'state',
        'priority',
        'quantity',
    ];

    protected $casts = [
        'state' => OrderState::class,
        'priority' => OrderPriority::class,
    ];

    protected $hidden = [
        'id',
        'customer_id',
        'variant_id',
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

    public function toDomain(): DomainOrder
    {
        return new DomainOrder(
            new OrderUuid($this->uuid),
            new CustomerUuid($this->customer->uuid),
            new VariantUuid($this->variant->uuid),
            $this->state,
            $this->priority,
            new OrderQuantity($this->quantity)
        );
    }
}
