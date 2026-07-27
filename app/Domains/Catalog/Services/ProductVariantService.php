<?php 


namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\ProductVariantDTO;
use App\Domains\Catalog\Models\ProductVariant;
use App\Domains\Catalog\Repository\ProductVariantRepository;
use Illuminate\Support\Facades\DB;



class ProductVariantService 
{
    public function __construct(protected ProductVariantRepository $repository){}


    public function execute(ProductVariantDTO $dto): ProductVariant
    {
        return DB::taransction(function () use ($dto) {
            return $this->repository->store($dto);
        });
    }
}