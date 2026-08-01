<?php
declare(strict_types=1);
namespace App\Domains\Catalog\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seo extends Model
{

     protected $fillable = [
        'product_id',

        // Basic SEO
        'meta_title',
        'meta_description',
        'meta_keywords',

        // Canonical
        'canonical_url',

        // Robots
        'robots',

        // Open Graph
        'og_title',
        'og_description',
        'og_image',

        // Twitter
        'twitter_title',
        'twitter_description',
        'twitter_image',

        // Structured Data
        'schema',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
