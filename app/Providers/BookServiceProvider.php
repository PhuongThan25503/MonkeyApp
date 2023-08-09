<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(BookRepositoryInterface::class, function ($app) {
            return new BookRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
