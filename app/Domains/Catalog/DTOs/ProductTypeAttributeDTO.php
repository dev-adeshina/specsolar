<?php

namespace App\Domains\Catalog\DTOs;


class ProductTypeAttributeDTO 
{
    public function __construct(
        public readonly ?int $product_type_id,
        public readonly ?int $attribute_id,
        public readonly ?bool $required,
        public readonly ?bool $is_variant,
        public readonly ?int $sort_order,
    ){}


    public function toArray(): array
    {
        return [
            'product_type_id' => $this->product_type_id,
            'attribute_id' => $this->attribute_id,
            'required' => $this->required,
            'is_variant' => $this->is_variant,
            'sort_order' => $this->sort_order,
        ];
    }

}