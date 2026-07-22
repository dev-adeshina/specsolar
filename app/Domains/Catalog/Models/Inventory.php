<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    //


    protected $fillable = [
        'warehouse_id',
        'product_variant_id',
        'quantity',
        'reserved',
        'minimum_stock',
        'reorder_level',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'reserved' => 'integer',
            'minimum_stock' => 'integer',
            'reorder_level' => 'integer',
        ];
    }


    public function variantattributevalue(): BelongsTo
    {
        return $this->belongsTo(VariantAttributeValue::class);
    }


    public function warehouse(): HasMany
    {
        return $this->hasMany(Warehouse::class);
    }
}
