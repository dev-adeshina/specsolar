<?php

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\Repository\Base\SharedRepository;
use App\Domains\Catalog\Models\Brand;
use App\Domains\Catalog\DTOs\BrandDTO;


class BrandRepository extends SharedRepository 
{
    public function __construct(Brand $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(BrandDTO $dto): Brand
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): Brand 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : Brand 
    {
        return $this->model->where('name', $value)->count();
    }
}