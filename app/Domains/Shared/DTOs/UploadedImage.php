<?php

namespace App\Domains\Shared\DTOs;

class UploadedImage
{
    public function __construct(

        public readonly string $url,

        public readonly string $publicId,

        public readonly int $width,

        public readonly int $height,

        public readonly string $format,

    ) {}
}