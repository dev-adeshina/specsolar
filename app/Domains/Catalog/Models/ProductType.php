<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductType extends Model
{
    //

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function producttypeattribute(): HasMany
    {
        return $this->hasMany(ProductTypeAttribute::class);
    }

    
}
