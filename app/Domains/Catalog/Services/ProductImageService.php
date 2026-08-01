<?php  

namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\ProductImageDTO;
use App\Domains\Catalog\Models\ProductImage;
use App\Domains\Catalog\Repository\ProductImageRepository;
use App\Domains\Shared\Contracts\ImageStorage;
use Illuminate\Support\Facades\DB;



class ProductImageService {
    public function __construct(protected ProductImageRepository $repository, protected ImageStorage $imageStorage){}

    public function execute(ProductImageDTO $dto) : ProductImage
    {
        $uploaded = null;

            DB::beginTransaction();

            try {

                if ($dto->image) {

                    $uploaded = $this->imageStorage->upload(
                        $dto->image,
                        'product-imgaes'
                    );

                    $dto->image_url = $uploaded->url;
                }
                $category = $this->repository->store($dto);

                DB::commit();

                return $category;

            } catch (\Throwable $e) {

                DB::rollBack();

                if ($uploaded) {
                    $this->imageStorage->delete($uploaded->publicId);
                }

                throw $e;
            }
    }

}