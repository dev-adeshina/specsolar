<?php 

namespace App\Domains\Catalog\DTOs;
use Illuminate\Http\UploadedFile;

class ProductImageDTO 
{
    public function __construct(
        public ?int $id,
        public int $product_id,
        public ?UploadedFile $image,
        public ?string $image_url,
        public ?string $alt,
        public bool $is_primary,
        public int $sort_order,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'image' => $this->image_url,
            'alt' => $this->alt,
            'is_primary' => $this->is_primary,
            'sort_order' => $this->sort_order,
        ];
    }
}