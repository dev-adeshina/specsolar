<?php

namespace App\Domains\Catalog\DTOs;


class ProductVariantDTO 
{
    public function __construct(
        public readonly ?int $product_id,
        public readonly ?string $sku,
        public readonly ?string $barcode,
        public readonly ?string $name,
        public readonly ?float $cost_price,
        public readonly ?float $selling_price,
        public readonly ?bool $status,
    ){}


    public function toArray(): array
    {
        return [
            'product_id' => $this->product_id,
            'sku' => $this->sku,
            'barcode' => $this->barcode,
            'name' => $this->name,
            'cost_price' => $this->cost_price,
            'selling_price' => $this->selling_price,
            'status' => $this->status,
        ];
    }

}