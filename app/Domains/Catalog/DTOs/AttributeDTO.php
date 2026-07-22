<?php

namespace App\Domains\Catalog\DTOs;


class AttributeDTO 
{
    public function __construct(
        public readonly ?int $attribute_group_id,
        public readonly ?string $name,
        public readonly ?string $slug,
        public readonly ?string $data_type,
        public readonly ?string $unit,
        public readonly ?bool $is_filterable,
        public readonly ?bool $is_searchable,
        public readonly ?int $sort_order,
    ){}


    public function toArray(): array
    {
        return [
            'attribute_group_id' => $this->attribute_group_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'data_type' => $this->data_type,
            'unit' => $this->unit,
            'is_filterable' => $this->is_filterable,
            'is_searchable' => $this->is_searchable,
            'sort_order' => $this->sort_order,
        ];
    }

}