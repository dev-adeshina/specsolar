<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    //

    protected $fillable = [
        'product_id',
        'sku',
        'barcode',
        'name',
        'cost_price',
        'selling_price',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'cost_price' => 'decimal:2',
            'selling_price' => 'decimal:2',
            'status' => 'boolean',
        ];
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function variantattributevalue(): HasMany
    {
        return $this->hasMany(VariantAttributeValue::class);
    }


}
