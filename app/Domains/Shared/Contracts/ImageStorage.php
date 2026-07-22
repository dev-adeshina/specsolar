<?php

namespace App\Domains\Shared\Contracts;

use Illuminate\Http\UploadedFile;
use App\Domains\Shared\DTOs\UploadedImage;

interface ImageStorage
{
    public function upload(UploadedFile $file, string $folder): UploadedImage;

    public function delete(string $publicId): bool;
}