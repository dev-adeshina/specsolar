<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\ProductTypeDTO;
use App\Domains\Catalog\Models\ProductType;
use App\Domains\Catalog\Repository\Base\SharedRepository;


class ProductTypeRepository extends SharedRepository 
{
    public function __construct(ProductType $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(ProductTypeDTO $dto): ProductType
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): ProductType 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : ProductType 
    {
        return $this->model->where('name', $value)->count();
    }
}