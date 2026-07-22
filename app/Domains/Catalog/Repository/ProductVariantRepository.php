<?php

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\ProductVariantDTO;
use App\Domains\Catalog\Models\ProductVariant;
use App\Domains\Catalog\Repository\Base\SharedRepository;


class ProductVariantRepository extends SharedRepository
{
    public function __construct(ProductVariant $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(ProductVariantDTO $dto): ProductVariant
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): ProductVariant 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : ProductVariant 
    {
        return $this->model->where('name', $value)->count();
    }
}
