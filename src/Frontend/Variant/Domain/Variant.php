<?php declare(strict_types=1);

namespace Src\Frontend\Variant\Domain;

final class Variant
{
    private VariantUuid $uuid;
    private VariantName $name;
    private VariantPrice $price;
    private VariantColor $color;
    private VariantHeight $height;
    private VariantWidth $width;
    private VariantWeight $weight;
    private VariantActive $active;

    public function __construct(
        VariantUuid $uuid,
        VariantName $name,
        VariantPrice $price,
        VariantColor $color,
        VariantHeight $height,
        VariantWidth $width,
        VariantWeight $weight,
        VariantActive $active
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->price = $price;
        $this->color = $color;
        $this->height = $height;
        $this->width = $width;
        $this->weight = $weight;
        $this->active = $active;
    }

    public static function create(
        VariantUuid $uuid,
        VariantName $name,
        VariantPrice $price,
        VariantColor $color,
        VariantHeight $height,
        VariantWidth $width,
        VariantWeight $weight,
        VariantActive $active
    ): self {
        return new self($uuid, $name, $price, $color, $height, $width, $weight, $active);
    }

    public function uuid(): VariantUuid
    {
        return $this->uuid;
    }

    public function name(): VariantName
    {
        return $this->name;
    }

    public function price(): VariantPrice
    {
        return $this->price;
    }

    public function color(): VariantColor
    {
        return $this->color;
    }

    public function height(): VariantHeight
    {
        return $this->height;
    }

    public function width(): VariantWidth
    {
        return $this->width;
    }

    public function weight(): VariantWeight
    {
        return $this->weight;
    }

    public function active(): VariantActive
    {
        return $this->active;
    }
}
