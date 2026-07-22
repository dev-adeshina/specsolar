<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domains\Shared\Contracts\ImageStorage;
use App\Domains\Shared\Services\CloudinaryImageStorage;
use Cloudinary\Cloudinary;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
         $this->app->singleton(Cloudinary::class, function () {

            return new Cloudinary([
                'cloud' => [
                    'cloud_name' => config('cloudinary.cloud_name'),
                    'api_key' => config('cloudinary.api_key'),
                    'api_secret' => config('cloudinary.api_secret'),
                ],
                'url' => [
                    'secure' => true,
                ],
            ]);

        });
        $this->app->singleton(ImageStorage::class, CloudinaryImageStorage::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
       
    }
}
