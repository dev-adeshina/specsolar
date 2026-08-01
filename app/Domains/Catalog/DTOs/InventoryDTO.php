<?php 

namespace App\Domains\Catalog\DTOs;

class InventoryDTO 
{
    public function __construct(
        public readonly ?int $product_id,
        public readonly ?int $quantity,
        public readonly ?int $reserved,
        public readonly ?int $minimum_stock,
        public readonly ?int $reorder_level,
    ) {}

    public function toArray(): array
    {
        return [
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'reserved' => $this->reserved,
            'minimum_stock' => $this->minimum_stock,
            'reorder_level' => $this->reorder_level,
        ];
    }
}