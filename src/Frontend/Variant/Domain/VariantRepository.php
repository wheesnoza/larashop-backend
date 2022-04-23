<?php declare(strict_types=1);

namespace Src\Frontend\Variant\Domain;

interface VariantRepository
{
    public function find(VariantId $id): Variant;
}
