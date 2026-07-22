<?php 

namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\CategoryDTO;
use App\Domains\Catalog\Models\Category;
use App\Domains\Catalog\Repository\CategoryRepository;
use App\Domains\Shared\Contracts\ImageStorage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class CategoryService 
{
    public function __construct(protected CategoryRepository $repository, protected ImageStorage $imageStorage){}

    public function execute(CategoryDTO $dto): Category
    {

        $uploaded = null;

            DB::beginTransaction();

            try {

                if ($dto->image) {

                    $uploaded = $this->imageStorage->upload(
                        $dto->image,
                        'categories'
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