<?php 

namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\ProductPriceDTO;
use App\Domains\Catalog\Models\ProductPrice;
use App\Domains\Catalog\Repository\ProductPriceRepository;
use Illuminate\Support\Facades\DB;


class ProductPriceService 
{
    public function __construct(
        protected ProductPriceRepository $repository,
    ) {}

    public function execute(ProductPriceDTO $dto): ProductPrice
    {
       return DB::transaction(function () use ($dto) {
            return $this->repository->store($dto);

        }); 
    }
}