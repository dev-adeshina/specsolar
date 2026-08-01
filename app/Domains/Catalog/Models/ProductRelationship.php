<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductRelationship extends Model
{
    //

    protected $fillable = [
        'product_id',
        'related_product_id',
        'relationship_type',
    ];

    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }
}
