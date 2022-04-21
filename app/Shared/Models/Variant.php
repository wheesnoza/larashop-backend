<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Src\Frontend\Variant\Domain\Variant as DomainVariant;
use Src\Frontend\Variant\Domain\VariantActive;
use Src\Frontend\Variant\Domain\VariantColor;
use Src\Frontend\Variant\Domain\VariantHeight;
use Src\Frontend\Variant\Domain\VariantName;
use Src\Frontend\Variant\Domain\VariantPrice;
use Src\Frontend\Variant\Domain\VariantUuid;
use Src\Frontend\Variant\Domain\VariantWeight;
use Src\Frontend\Variant\Domain\VariantWidth;

final class Variant extends Model
{
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

    protected $casts = [
        'active' => 'bool'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function toDomain(): DomainVariant
    {
        return new DomainVariant(
            new VariantUuid($this->uuid),
            new VariantName($this->name),
            new VariantPrice($this->price),
            new VariantColor($this->color),
            new VariantHeight($this->height),
            new VariantWidth($this->width),
            new VariantWeight($this->weight),
            new VariantActive($this->active),
        );
    }
}
