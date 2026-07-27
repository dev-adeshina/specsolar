<?php

namespace App\Domains\Catalog\Services;


use App\Domains\Catalog\DTOs\AttributeGroupDTO;
use App\Domains\Catalog\Models\AttributeGroup;
use App\Domains\Catalog\Repository\AttributeGroupRepository;
use Illuminate\Support\Facades\DB;


class AttributeGroupService 
{
    public function __construct(protected AttributeGroupRepository $repository, ){}

    public function execute(AttributeGroupDTO $dto) : AttributeGroup
    {
        return DB::transaction(function () use($dto) {
            return $this->repository->store($dto);
        });
        
    }
}