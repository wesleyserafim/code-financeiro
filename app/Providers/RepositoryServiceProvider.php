<?php

namespace CodeFin\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\CodeFin\Repositories\Interfaces\BankRepository::class, \CodeFin\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\Interfaces\BankAccountRepository::class, \CodeFin\Repositories\BankAccountRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\Interfaces\ClientRepository::class, \CodeFin\Repositories\ClientRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\Interfaces\CategoryRepository::class, \CodeFin\Repositories\CategoryRepositoryEloquent::class);
        //:end-bindings:
    }
}
