<?php 

namespace App\Domains\Catalog\Repository;

use App\Domains\Catalog\DTOs\WarehouseDTO;
use App\Domains\Catalog\Models\Warehouse;
use App\Domains\Catalog\Repository\Base\SharedRepository;




class WarehaouseRepository extends SharedRepository
{
    public function __construct(Warehouse $model)
    {
        return parent::__construct($model);
    }


    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    public function store(WarehouseDTO $dto): Warehouse
    {
        return parent::persist($dto->toArray());
    }

    public function search(string $query): Warehouse 
    {
        return $this->model->whereLike('name', $query)->get();
    }

    public function count(string $value) : Warehouse 
    {
        return $this->model->where('name', $value)->count();
    }
}