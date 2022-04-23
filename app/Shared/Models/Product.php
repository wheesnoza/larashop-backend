<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Snowflake\SnowflakeCast;
use Src\Frontend\Product\Domain\Product as DomainProduct;
use Src\Frontend\Product\Domain\ProductDescription;
use Src\Frontend\Product\Domain\ProductName;
use Src\Frontend\Product\Domain\ProductId;

final class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    protected $casts = [
        'id' => SnowflakeCast::class,
    ];

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function toDomain(): DomainProduct
    {
        return new DomainProduct(
            new ProductId($this->id),
            new ProductName($this->name),
            new ProductDescription($this->description)
        );
    }
}
