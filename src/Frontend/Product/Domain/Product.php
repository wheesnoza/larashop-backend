<?php declare(strict_types=1);

namespace Src\Frontend\Product\Domain;

use Src\Shared\Domain\Aggregate\DomainEventAggregateRoot;

final class Product extends DomainEventAggregateRoot
{
    private ProductId $id;
    private ProductName $name;
    private ProductDescription $description;

    public function __construct(
        ProductId          $id,
        ProductName        $name,
        ProductDescription $description
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public static function create(
        ProductId          $id,
        ProductName        $name,
        ProductDescription $description
    ): self {
        $product = new self($id, $name, $description);

        $product->record(new ProductCreatedDomainEvent($product));

        return $product;
    }

    /**
     * @return ProductId
     */
    public function id(): ProductId
    {
        return $this->id;
    }

    /**
     * @return ProductName
     */
    public function name(): ProductName
    {
        return $this->name;
    }

    /**
     * @return ProductDescription
     */
    public function description(): ProductDescription
    {
        return $this->description;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id()->value(),
            'name' => $this->name()->value(),
            'description' => $this->description()->value(),
        ];
    }
}
