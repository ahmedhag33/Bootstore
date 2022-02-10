<?php

namespace App\Providers;

use App\Services\BaseService;
use App\Services\IBaseService;
use App\Services\Product\AuthorService;
use App\Services\Product\CategoryService;
use App\Services\Product\IAuthorService;
use App\Services\Product\ICategoryService;
use App\Services\Product\IPublisherService;
use App\Services\Product\PublisherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBaseService::class, BaseService::class);
        $this->app->bind(ICategoryService::class, CategoryService::class);
        $this->app->bind(IPublisherService::class, PublisherService::class);
        $this->app->bind(IAuthorService::class, AuthorService::class);
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
