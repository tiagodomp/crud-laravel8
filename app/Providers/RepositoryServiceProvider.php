<?php

namespace App\Providers;

use App\Repositories\IEloquentRepository;
use App\Repositories\IUserRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\BaseRepository;
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
