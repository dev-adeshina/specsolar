<?php

namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\BrandDTO;
use App\Domains\Catalog\Models\Brand;
use App\Domains\Catalog\Repository\BrandRepository;
use App\Domains\Shared\Contracts\ImageStorage;
use Illuminate\Support\Facades\DB;

class BrandService
{
    public function __construct(protected BrandRepository $repository, protected ImageStorage $imageStorage) {}

    public function execute(BrandDTO $dto): Brand
    {


        $uploaded = null;
      
        try {
            
            if ($dto->logo) {

                $uploaded = $this->imageStorage->upload(
                    $dto->logo,
                    'brands'
                );
                $dto->logo = $uploaded->url;
            }
                

            return DB::transaction(function () use ($dto) {

                return $this->repository->store($dto);
            });
        } catch (\Throwable $e) {

            if ($uploaded) {
                $this->imageStorage->delete($uploaded->publicId);
            }

            throw $e;
        }
    }
}
