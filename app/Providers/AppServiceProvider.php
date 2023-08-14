<?php

namespace App\Providers;

use App\Models\Type;
use App\Repositories\AudioRepository;
use App\Repositories\AudioRepositoryInterface;
use App\Repositories\PageRepository;
use App\Repositories\PageRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\StoryRepository;
use App\Repositories\StoryRepositoryInterface;
use App\Repositories\TextConfigRepository;
use App\Repositories\TextConfigRepositoryInterface;
use App\Repositories\TextRepository;
use App\Repositories\TextRepositoryInterface;
use App\Repositories\TouchRepository;
use App\Repositories\TouchRepositoryInterface;
use App\Repositories\TypeRepository;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StoryRepositoryInterface::class, function(){
            return new StoryRepository();
        });
        $this->app->bind(TouchRepositoryInterface::class, function (){
            return new TouchRepository();
        });
        $this->app->bind(PageRepositoryInterface::class, function (){
            return new PageRepository();
        });
        $this->app->bind(TextConfigRepositoryInterface::class, function(){
            return new TextConfigRepository();
        });
        $this->app->bind(TextRepositoryInterface::class, function (){
            return new TextRepository();
        });
        $this->app->bind(AudioRepositoryInterface::class,function (){
            return new AudioRepository();
        });
        $this->app->bind(TypeRepositoryInterface::class,function (){
            return new TypeRepository();
        });
        $this->app->bind(RoleRepositoryInterface::class, function (){
            return new RoleRepository();
        });
        $this->app->bind(UserRepositoryInterface::class, function (){
            return new UserRepository();
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
