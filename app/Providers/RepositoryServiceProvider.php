<?php

namespace App\Providers;

use App\Repository\IEloquentRepository;
use App\Repository\IUserRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(IEloquentRepository::class, BaseRepository::class);
       $this->app->bind(IUserRepository::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
