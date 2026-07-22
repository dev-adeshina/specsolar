<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeGroup extends Model
{
    //


    protected $fillable = [
        'name',
        'sort_order',
    ];
    public function attribute(): BelongsTo 
    {
        return $this->belongsTo(Attribute::class);
    }
}
