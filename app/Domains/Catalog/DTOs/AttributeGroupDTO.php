<?php

namespace App\Domains\Catalog\DTOs;


class AttributeGroupDTO 
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?int $sort_order,
    ){}


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'sort_order' => $this->sort_order,
        ];
    }

}