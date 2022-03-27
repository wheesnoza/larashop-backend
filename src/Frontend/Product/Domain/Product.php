<?php declare(strict_types=1);

namespace Src\Frontend\Product\Domain;

final class Product
{
    private ProductUuid $uuid;
    private ProductName $name;
    private ProductDescription $description;

    public function __construct(
        ProductUuid $uuid,
        ProductName $name,
        ProductDescription $description
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
    }

    public static function create(
        ProductUuid $uuid,
        ProductName $name,
        ProductDescription $description
    ): self {
        return new self($uuid, $name, $description);
    }

    /**
     * @return ProductUuid
     */
    public function uuid(): ProductUuid
    {
        return $this->uuid;
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
            'uuid' => $this->uuid()->value(),
            'name' => $this->name()->value(),
            'description' => $this->description()->value(),
        ];
    }
}
