<?php declare(strict_types=1);

namespace App\Shared\Models;

use App\Shared\Casts\SnowflakeId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Stock extends Model
{
    protected $fillable = [
        'id',
        'variant_id'
    ];

    protected $casts = [
        'id' => SnowflakeId::class,
        'variant_id' => SnowflakeId::class,
    ];

    public function variant(): BelongsTo
    {
        return $this->belongsTo(Variant::class);
    }

    public function getIncrementing(): bool
    {
        return false;
    }
}
