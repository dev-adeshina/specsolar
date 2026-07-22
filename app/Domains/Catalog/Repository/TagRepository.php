<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\TagDTO;
use App\Domains\Catalog\Models\Tag;
use App\Domains\Catalog\Repository\Base\SharedRepository;


class TagRepository extends SharedRepository 
{
    public function __construct(Tag $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(TagDTO $dto): Tag
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): Tag 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : Tag 
    {
        return $this->model->where('name', $value)->count();
    }
}