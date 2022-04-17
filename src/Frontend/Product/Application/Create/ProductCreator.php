<?php declare(strict_types=1);

namespace Src\Frontend\Product\Application\Create;

use Src\Frontend\Product\Domain\Product;
use Src\Frontend\Product\Domain\ProductDescription;
use Src\Frontend\Product\Domain\ProductName;
use Src\Frontend\Product\Domain\ProductRepository;
use Src\Frontend\Product\Domain\ProductUuid;
use Src\Shared\Domain\Bus\Event\EventBus;

final class ProductCreator
{
    private ProductRepository $productRepository;
    private EventBus $bus;

    public function __construct(ProductRepository $productRepository, EventBus $bus)
    {
        $this->productRepository = $productRepository;
        $this->bus = $bus;
    }

    public function __invoke(array $attributes): Product
    {
        $product = Product::create(
            ProductUuid::generate(),
            new ProductName($attributes['name']),
            new ProductDescription($attributes['description'])
        );

        $this->productRepository
            ->save($product);

        $this->bus->publish(...$product->pullDomainEvents());

        return $product;
    }
}
