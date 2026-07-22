<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\ProductDTO;
use App\Domains\Catalog\Models\Product;
use App\Domains\Catalog\Repository\Base\SharedRepository;

class ProductRepository extends SharedRepository 
{
    public function __construct(Product $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(ProductDTO $dto): Product
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): Product 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : Product 
    {
        return $this->model->where('name', $value)->count();
    }
}