<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\ProductImageDTO;
use App\Domains\Catalog\Models\ProductImage;
use App\Domains\Catalog\Repository\Base\SharedRepository;

class ProductImageRepository extends SharedRepository 
{
    public function __construct(ProductImage $model)
    {
        parent::__construct($model);
    }

    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(ProductImageDTO $dto): ProductImage
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): ProductImage 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : ProductImage 
    {
        return $this->model->where('name', $value)->count();
    }
}