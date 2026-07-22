<?php 

namespace App\Domains\Catalog\Repository\Base;

use Illuminate\Database\Eloquent\Model;

abstract class SharedRepository 
{
    public function __construct(protected Model $model){}


    protected function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    protected function paginate(int $perPage = 10)
    {
        return $this->model->pagiante($perPage);
    }

    protected function persist(array $data) 
    {
        return $this->model->create($data);
    }

    protected function update(int $id, array $data) 
    {
        return $this->model->where('id', $id)->update($data);
    }


    protected function delete(int $id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    protected function exists(string $field, mixed $value): bool
    {
        return $this->model->where($field, $value)->exists();
    }
}