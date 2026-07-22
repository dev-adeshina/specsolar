<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attribute extends Model
{
    //

    protected $fillable = [
        'attribute_group_id',
        'name',
        'slug',
        'data_type',
        'unit',
        'is_filterable',
        'is_searchable',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_filterable' => 'boolean',
            'is_searchable' => 'boolean',
        ];
    }

    public function producttypeattribute(): BelongsTo 
    {
        return $this->belongsTo(ProductTypeAttribute::class);
    }

    public function attributegroup(): HasMany 
    {
        return $this->hasMany(AttributeGroup::class);
    }
}