<?php

namespace App\Providers;

use App\Repositories\PageRepository;
use App\Repositories\PageRepositoryInterface;
use App\Repositories\StoryRepository;
use App\Repositories\StoryRepositoryInterface;
use App\Repositories\TextConfigRepository;
use App\Repositories\TextConfigRepositoryInterface;
use App\Repositories\TextRepository;
use App\Repositories\TextRepositoryInterface;
use App\Repositories\TouchRepository;
use App\Repositories\TouchRepositoryInterface;
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
        $this->app->bind(TouchRepositoryInterface::class, function ($app){
            return new TouchRepository();
        });
        $this->app->bind(PageRepositoryInterface::class, function ($app){
            return new PageRepository();
        });
        $this->app->bind(TextConfigRepositoryInterface::class, function($app){
            return new TextConfigRepository();
        });
        $this->app->bind(TextRepositoryInterface::class, function ($app){
            return new TextRepository();
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
