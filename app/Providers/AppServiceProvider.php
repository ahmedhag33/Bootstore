<?php

namespace App\Providers;

use App\Services\BaseService;
use App\Services\Cart\CartItemService;
use App\Services\Cart\ICartItemService;
use App\Services\Cart\IUserDetailService;
use App\Services\Cart\UserDetailService;
use App\Services\IBaseService;
use App\Services\Product\AuthorService;
use App\Services\Product\BookService;
use App\Services\Product\CategoryService;
use App\Services\Product\IAuthorService;
use App\Services\Product\IBookService;
use App\Services\Product\ICategoryService;
use App\Services\Product\IPublisherService;
use App\Services\Product\PublisherService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        $this->app->bind(IBookService::class, BookService::class);
        $this->app->bind(IUserDetailService::class, UserDetailService::class);
        $this->app->bind(ICartItemService::class, CartItemService::class);
        
        Schema::defaultStringLength(191);
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
