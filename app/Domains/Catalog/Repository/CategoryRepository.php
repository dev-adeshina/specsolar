<?php

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\CategoryDTO;
use App\Domains\Catalog\Models\Category;
use App\Domains\Catalog\Repository\Base\SharedRepository;
use Illuminate\Support\Facades\Log;




class CategoryRepository extends SharedRepository 
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(CategoryDTO $dto): Category
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): Category 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : Category 
    {
        return $this->model->where('name', $value)->count();
    }
    
}