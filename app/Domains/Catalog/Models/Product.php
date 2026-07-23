<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    //
    
    protected $fillable = [
        'category_id',
        'brand_id',
        'product_type_id',
        'name',
        'slug',
        'sku',
        'short_description',
        'description',
        'status',
        'visibility',
        'is_featured',
        'is_service',
        'barcode',
        'weight',
        'length',
        'width',
        'height',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'visibility' => 'boolean',
            'is_featured' => 'boolean',
            'is_service' => 'boolean',
            'weight' => 'decimal:2',
            'length' => 'decimal:2',
            'width' => 'decimal:2',
            'height' => 'decimal:2',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function producttype(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function productattributevalue(): HasMany
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function productvariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function productimages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productdocument(): HasMany
    {
        return $this->hasMany(ProductDocument::class);
    }

    public function productrelationship(): HasMany
    {
        return $this->hasMany(ProductRelationship::class);
    }

    public function producttag(): BelongsTo
    {
        return $this->belongsTo(ProductTag::class);
    }

    public function productreview(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }
}
