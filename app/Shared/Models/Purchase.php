<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Purchase extends Model
{
    protected $fillable = [
        'customer_id',
        'variant_id',
        'uuid',
        'state',
        'priority',
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
}