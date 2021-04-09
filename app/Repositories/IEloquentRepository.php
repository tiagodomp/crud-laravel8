<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface IEloquentRepository
{
   /**
    * @param array $data
    * @return Model
    */
   public function create(array $data): Model;


   /**
    * @param array $attr
    * @param array $options
    * @return bool
    */
    public function update(array $attr, array $options): bool;


   /**
    * @param array $id
    * @return bool
    */
   public function delete(int $id): bool;


   /**
    * @param int $id
    * @return Model
    */
   public function find(int $id): ?Model;

   /**
    * @param $query
    * @return Collection
    */
    public function search($query): ?Collection;
}
