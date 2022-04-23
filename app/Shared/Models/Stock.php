<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Snowflake\SnowflakeCast;

final class Stock extends Model
{
    protected $fillable = [
        'id',
        'variant_id'
    ];

    protected $casts = [
        'id' => SnowflakeCast::class,
        'variant_id' => SnowflakeCast::class,
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
