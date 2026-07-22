<?php 

namespace App\Domains\Shared\Validation;

use Illuminate\Validation\Rules\File;

class ImageRules 
{
    public static function upload(): array 
    {
        return [
            'required',
            File::image()->types(['jpg', 'jpeg', 'png', 'webp'])->max(2048),
        ];
    }

    
}