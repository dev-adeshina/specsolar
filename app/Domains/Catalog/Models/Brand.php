<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    //

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'website',
        'country',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
