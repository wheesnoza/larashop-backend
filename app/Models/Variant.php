<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'price',
        'color',
        'height',
        'width',
        'weight',
        'active',
    ];

    protected $hidden = [
        'id',
        'product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
