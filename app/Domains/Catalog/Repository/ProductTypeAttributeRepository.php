<?php

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\ProductTypeAttributeDTO;
use App\Domains\Catalog\Models\ProductTypeAttribute;
use App\Domains\Catalog\Repository\Base\SharedRepository;


class ProductTypeAttributeRepository extends SharedRepository
{
    public function __construct(ProductTypeAttribute $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(ProductTypeAttributeDTO $dto): ProductTypeAttribute
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): ProductTypeAttribute 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : ProductTypeAttribute 
    {
        return $this->model->where('name', $value)->count();
    }
}
