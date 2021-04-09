<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\IUserRepository;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements IUserRepository
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(User $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();
   }

   /**
    * @return Collection
    */
   public function count(): int
   {
       return $this->model->count();
   }
}
