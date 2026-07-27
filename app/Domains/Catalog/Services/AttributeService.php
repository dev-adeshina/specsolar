<?php 


namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\AttributeDTO;
use App\Domains\Catalog\Models\Attribute as ModelsAttribute;
use App\Domains\Catalog\Repository\AttributeRepository;
use Illuminate\Support\Facades\DB;




class AttributeService 
{
    public function __construct(protected AttributeRepository $repository){}

    public function execute(AttributeDTO $dto) : ModelsAttribute
    {
        return DB::transaction(function () use ($dto) {
                return $this->repository->store($dto);
        });
    }
}
