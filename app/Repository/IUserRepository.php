<?php
namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Collection;

interface IUserRepository
{
   public function all(): Collection;

   public function count(): int;
}
