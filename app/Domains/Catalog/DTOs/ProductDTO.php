<?php

namespace App\Domains\Catalog\DTOs;


class ProductDTO 
{
    public function __construct(
        public readonly ?int $category_id,
        public readonly ?int $brand_id,
        public readonly ?int $product_type_id,

        public readonly ?string $name,
        public readonly ?string $slug,
        public readonly ?string $sku,

        public readonly ?string $short_description,
        public readonly ?string $description,

        public readonly ?bool $status,
        public readonly ?bool $visibility,

        public readonly ?bool $is_featured,
        public readonly ?bool $is_service,

        public readonly ?string $barcode,

        public readonly ?float $weight,
        public readonly ?float $length,
        public readonly ?float $width,
        public readonly ?float $height,
    ){}


    public function toArray(): array
    {
        return [
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'product_type_id' => $this->product_type_id,

            'name' => $this->name,
            'slug' => $this->slug,
            'sku' => $this->sku,

            'short_description' => $this->short_description,
            'description' => $this->description,

            'status' => $this->status,
            'visibility' => $this->visibility,

            'is_featured' => $this->is_featured,
            'is_service' => $this->is_service,

            'barcode' => $this->barcode,

            'weight' => $this->weight,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }

}