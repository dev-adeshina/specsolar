<?php

namespace App\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeGroup extends Model
{
    //


    protected $fillable = [
        'name',
        'sort_order',
    ];
    public function attribute(): HasMany 
    {
        return $this->hasMany(Attribute::class);
    }
}
