<?php

namespace App\Providers;

use App\Repositories\StoryRepository;
use App\Repositories\StoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StoryRepositoryInterface::class, function($app){
            return new StoryRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
