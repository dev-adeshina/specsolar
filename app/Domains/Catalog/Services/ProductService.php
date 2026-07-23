<?php 

namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\ProductDTO;
use App\Domains\Catalog\Models\Product;
use App\Domains\Catalog\Repository\ProductRepository;
use App\Domains\Shared\Contracts\ImageStorage;
use Illuminate\Support\Facades\DB;



class ProductService 
{
    public function __construct(
        protected ProductRepository $repository,
    ) {}

    public function execute(ProductDTO $dto): Product
    {
       return DB::transaction(function () use ($dto) {

            return $this->repository->store($dto);

        }); 
    }
}