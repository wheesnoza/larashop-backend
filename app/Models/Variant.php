<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
