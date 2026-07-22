<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTag extends Model
{
    //

    protected $fillable = [
        'product_id',
        'tag_id',
    ];

    public function product(): BelongsTo
    {
        return $this->hasMany(Product::class);
    }

    public function tag(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}
