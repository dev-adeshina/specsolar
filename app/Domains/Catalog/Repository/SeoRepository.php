<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\SeoDTO;
use App\Domains\Catalog\Models\Seo;
use App\Domains\Catalog\Repository\Base\SharedRepository;

class SeoRepository extends SharedRepository 
{
    public function __construct(Seo $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(SeoDTO $dto): Seo
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): Seo 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : Seo 
    {
        return $this->model->where('name', $value)->count();
    }

    public function findByProductId(int $productId): ?Seo
    {
        return $this->model->where('product_id', $productId)->first();
    }

    

    public function updateByProductId(int $productId, SeoDTO $dto): Seo
    {
        $updated = $this->model
            ->where('product_id', $productId)
            ->update($dto->toArray());

        if ($updated === 0) {
            // no row updated => SEO not found for this product
            throw new \RuntimeException('SEO not found for this product.');
        }

        return $this->findByProductId($productId);
    }
}