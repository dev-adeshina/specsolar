<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductTypeAttribute extends Model
{
    //

    protected $fillable = [
        'product_type_id',
        'attribute_id',
        'required',
        'is_variant',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'required' => 'boolean',
            'is_variant' => 'boolean',
        ];
    }

    public function producttype(): HasMany
    {
        return $this->hasMany(ProductType::class);
    }

    public function attribute(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }
}
