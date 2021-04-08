<?php

namespace App\Repository\Eloquent;

use App\Repository\IEloquentRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IEloquentRepository
{
    /**
     * @var Model
     */
     protected $model;

    /**
     * Constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
    * @param array $data
    * @return Model
    */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
    * @param array $attr
    * @param array $options
    * @return bool
    */
    public function update(array $attr, array $options): bool
    {
        return $this->model->update($attr, $options);
    }

    /**
    * @param array $id
    * @return bool
    */
    public function delete(int $id): bool
    {
        return $this->model->delete($id);
    }

    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }
}
