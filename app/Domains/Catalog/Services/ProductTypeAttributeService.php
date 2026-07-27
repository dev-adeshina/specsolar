<?php 


namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\ProductTypeAttributeDTO;
use App\Domains\Catalog\Models\ProductTypeAttribute;
use App\Domains\Catalog\Repository\ProductTypeAttributeRepository;
use Illuminate\Support\Facades\DB;



class ProductTypeAttributeService 
{
    public function __construct(protected ProductTypeAttributeRepository $repository){}


    public function execute(ProductTypeAttributeDTO $dto) : ProductTypeAttribute
    {
        return DB::transaction(function ()  use ($dto) {
            return $this->repository->store($dto);
        });
    }
}