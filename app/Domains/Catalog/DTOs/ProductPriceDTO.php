<?php 

namespace App\Domains\Catalog\DTOs;

use App\Domains\Catalog\Models\ProductPrice;
use DateTimeInterface;

class ProductPriceDTO 
{
    public function __construct(
        public readonly int $product_id,
        public readonly string $currency,
        public readonly string $price_type,
        public readonly string $amount, // keep as string to preserve decimal precision
        public readonly ?DateTimeInterface $starts_at,
        public readonly ?DateTimeInterface $ends_at,
    ) {}

    public static function fromModel(ProductPrice $model): self
    {
        return new self(
            product_id: $model->product_variant_id,
            currency: (string) $model->currency,
            price_type: (string) $model->price_type,
            amount: (string) $model->amount,
            starts_at: $model->starts_at,
            ends_at: $model->ends_at,
        );
    }

    
    public function toArray(): array
    {
        return [
            'product_id' => $this->product_id,
            'currency' => $this->currency,
            'price_type' => $this->price_type,
            'amount' => $this->amount,
            'starts_at' => $this->starts_at?->format('Y-m-d H:i:s'),
            'ends_at' => $this->ends_at?->format('Y-m-d H:i:s'),
        ];
    }
}