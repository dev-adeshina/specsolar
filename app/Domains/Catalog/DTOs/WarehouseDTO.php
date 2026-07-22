<?php

namespace App\Domains\Catalog\DTOs;


class WarehouseDTO 
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $location,
        public readonly ?int $manager_id,
    ){}


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'location' => $this->location,
            'manager_id' => $this->manager_id,
        ];
    }

}