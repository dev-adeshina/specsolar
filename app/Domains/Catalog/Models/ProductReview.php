<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    //

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'title',
        'review',
        'approved',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'decimal:1',
            'approved' => 'boolean',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->hasMany(Product::class);
    }
}
