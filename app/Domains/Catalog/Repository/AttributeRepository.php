<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\AttributeDTO;
use App\Domains\Catalog\Models\Attribute;
use App\Domains\Catalog\Repository\Base\SharedRepository;


class AttributeRepository extends SharedRepository 
{
    public function __construct(Attribute $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(AttributeDTO $dto): Attribute
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): Attribute 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : Attribute 
    {
        return $this->model->where('name', $value)->count();
    }
}