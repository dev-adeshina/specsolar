<?php 

namespace App\Domains\Shared\Services;

use App\Domains\Shared\Contracts\ImageStorage;
use App\Domains\Shared\DTOs\UploadedImage;
use Illuminate\Http\UploadedFile;
use App\Domains\Shared\Exceptions\ImageUploadException;
use Cloudinary\Cloudinary;

class CloudinaryImageStorage implements ImageStorage
{
    public function __construct(protected Cloudinary $cloudinary){}

    public function upload(UploadedFile $file, string $folder): UploadedImage 
    {
        
        try{
            $result = $this->cloudinary->uploadApi()->upload($file->getRealPath(), ['folder' => $folder,]);
            return new UploadedImage(
                url: $result['secure_url'],
                publicId: $result['public_id'],
                width: $result['width'],
                height: $result['height'],
                format: $result['format'],
            );
        }catch(\Throwable $e) {
            throw new ImageUploadException($e->getMessage(), previous: $e);
        }
       
    }

    public function delete(string $publicId): bool 
    {
        
        try{
             $response = $this->cloudinary->uploadApi()->destroy($publicId);

            return $response['result'] === 'ok';
        }catch(\Throwable $e) {
            throw new ImageUploadException($e->getMessage(), previous: $e);
        }
    
           
    }
}