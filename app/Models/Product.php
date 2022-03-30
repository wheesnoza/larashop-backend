<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Src\Frontend\Product\Domain\Product as DomainProduct;
use Src\Frontend\Product\Domain\ProductDescription;
use Src\Frontend\Product\Domain\ProductName;
use Src\Frontend\Product\Domain\ProductUuid;

final class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    protected $hidden = [
        'id',
    ];

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

    public function toDomain(): DomainProduct
    {
        return new DomainProduct(
            new ProductUuid($this->uuid),
            new ProductName($this->name),
            new ProductDescription($this->description)
        );
    }
}
