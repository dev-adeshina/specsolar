<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\InventoryDTO;
use App\Domains\Catalog\Models\Inventory;
use App\Domains\Catalog\Repository\Base\SharedRepository;

class InventoryRepository extends SharedRepository 
{
    public function __construct(Inventory $model)
    {
        parent::__construct($model);
    }

    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(InventoryDTO $dto): Inventory
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): Inventory 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : Inventory 
    {
        return $this->model->where('name', $value)->count();
    }
}