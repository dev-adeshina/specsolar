<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VariantAttributeValue extends Model
{
    //

    protected $fillable = [
        'product_variant_id',
        'attribute_id',
        'value',
    ];

    public function productvariant(): BelongsTo
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    public function productprice(): HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }
}
