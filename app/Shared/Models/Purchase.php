<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Frontend\Purchase\Domain\PurchasePriority;
use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Src\Frontend\Purchase\Domain\PurchaseState;
use Src\Frontend\Purchase\Domain\Purchase as DomainPurchase;
use Src\Frontend\Purchase\Domain\PurchaseUuid;
use Src\Frontend\Variant\Domain\VariantUuid;

final class Purchase extends Model
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
        'state' => PurchaseState::class,
        'priority' => PurchasePriority::class,
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

    public function toDomain(): DomainPurchase
    {
        return new DomainPurchase(
            new PurchaseUuid($this->uuid),
            new CustomerUuid($this->customer->uuid),
            new VariantUuid($this->variant->uuid),
            $this->state,
            $this->priority,
            new PurchaseQuantity($this->quantity)
        );
    }
}
