<?php declare(strict_types=1);

namespace Src\Frontend\Product\Application\Find;

use App\Frontend\Product\Exceptions\ProductNotFoundException;
use Src\Frontend\Product\Domain\Product;
use Src\Frontend\Product\Domain\ProductRepository;

final class ProductFinder
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function __invoke(string $uuid): Product
    {
        $product = $this->productRepository
            ->find($uuid);

        if (is_null($product)) {
            throw new ProductNotFoundException();
        }

        return $product;
    }
}
