<?php 


namespace App\Domains\Catalog\DTOs;

class SeoDTO 
{
    public function __construct(
        public readonly ?string $meta_title,
        public readonly ?string $meta_description,
        public readonly ?string $meta_keywords,

        public readonly ?string $canonical_url,

        public readonly ?string $robots,

        public readonly ?string $og_title,
        public readonly ?string $og_description,
        public readonly ?string $og_image,

        public readonly ?string $twitter_title,
        public readonly ?string $twitter_description,
        public readonly ?string $twitter_image,

        public readonly ?array $schema,
    ) {}


    public function toArray(): array 
    {
        return [
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,

            'canonical_url' => $this->canonical_url,

            'robots' => $this->robots,

            'og_title' => $this->og_title,
            'og_description' => $this->og_description,
            'og_image' => $this->og_image,

            'twitter_title' => $this->twitter_title,
            'twitter_description' => $this->twitter_description,
            'twitter_image' => $this->twitter_image,

            'schema' => $this->schema,
        ];
    }
}

