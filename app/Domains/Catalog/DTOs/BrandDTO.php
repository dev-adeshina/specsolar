<?php

namespace App\Domains\Catalog\DTOs;

use Illuminate\Http\UploadedFile;

class BrandDTO 
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $slug,
        public  UploadedFile|string|null $logo,
        public readonly ?string $website,
        public readonly ?string $country,
        public readonly ?string $description,
        public readonly ?bool $status,

    ){}


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'logo' => $this->logo,
            'website' => $this->website,
            'country' => $this->country,
            'description' => $this->description,
            'status' => $this->status,
        ];
    }

}