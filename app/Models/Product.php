<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Frontend\Product\Domain\Product as DomainProduct;
use Src\Frontend\Product\Domain\ProductDescription;
use Src\Frontend\Product\Domain\ProductName;
use Src\Frontend\Product\Domain\ProductUuid;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    public function toDomain(): DomainProduct
    {
        return new DomainProduct(
            new ProductUuid($this->uuid),
            new ProductName($this->name),
            new ProductDescription($this->description)
        );
    }
}
