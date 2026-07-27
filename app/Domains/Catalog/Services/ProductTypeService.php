<?php 


namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\ProductTypeDTO;
use App\Domains\Catalog\Models\ProductType;
use App\Domains\Catalog\Repository\ProductTypeRepository;
use Illuminate\Support\Facades\DB;



class ProductTypeService {
    public function __construct(protected ProductTypeRepository $repository){}


    public function execute(ProductTypeDTO $dto): ProductType
    {
        return DB::transaction(function () use ($dto) {
            return $this->repository->store($dto);
        });
    }
}