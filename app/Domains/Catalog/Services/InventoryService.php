<?php 

namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\InventoryDTO;
use App\Domains\Catalog\Models\Inventory;
use App\Domains\Catalog\Repository\InventoryRepository;
use Illuminate\Support\Facades\DB;



class InventoryService 
{
    public function __construct(protected InventoryRepository $repository){}

    public function execute(InventoryDTO $dto): Inventory
    {
       return DB::transaction(function () use ($dto) {
            return $this->repository->store($dto);

        }); 
    }
}