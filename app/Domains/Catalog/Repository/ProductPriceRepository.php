<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\ProductPriceDTO;
use App\Domains\Catalog\Models\ProductPrice;
use App\Domains\Catalog\Repository\Base\SharedRepository;

class ProductPriceRepository extends SharedRepository
{
    public function __construct(ProductPrice $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(ProductPriceDTO $dto): ProductPrice
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): ProductPrice 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : ProductPrice 
    {
        return $this->model->where('name', $value)->count();
    }
}