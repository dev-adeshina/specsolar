<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\AttributeGroupDTO;
use App\Domains\Catalog\Repository\Base\SharedRepository;
use App\Domains\Catalog\Models\AttributeGroup;

class AttributeGroupRepository extends SharedRepository 
{

    public function __construct(AttributeGroup $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(AttributeGroupDTO $dto): AttributeGroup
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): AttributeGroup 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : AttributeGroup 
    {
        return $this->model->where('name', $value)->count();
    }
} 