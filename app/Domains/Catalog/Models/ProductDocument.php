<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Belongs;

class ProductDocument extends Model
{
    //

    protected $fillable = [
        'product_id',
        'title',
        'document_type',
        'file_path',
    ];

    public function product(): BelongsTo
    {
        return $this->hasMany(Product::class);
    }
}
