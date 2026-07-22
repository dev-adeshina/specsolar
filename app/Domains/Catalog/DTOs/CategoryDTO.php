<?php

namespace App\Domains\Catalog\DTOs;
use Illuminate\Http\UploadedFile;

class CategoryDTO {
    public function __construct(
        public readonly ?int $parent_id,
        public readonly ?string $name,
        public readonly ?string $slug,
        public readonly ?string $description,
        public readonly ?string $icon,
        public ?UploadedFile $image,
        public ?string $image_url,
        public readonly ?int $sort_order,
        public readonly ?string $status,

    ) {}


    public function toArray(): array
    {
        return [
            'parent_id' => $this->parent_id ?: null,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'icon' => $this->icon,
            'image' => $this->image_url,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
        ];
    }
}