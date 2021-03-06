<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\Cart\CartItemRepository;
use App\Repository\Cart\ICartItemRepository;
use App\Repository\Cart\IUserDetailRepository;
use App\Repository\Cart\UserDetailRepository;
use App\Repository\IBaseRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Product\AuthorRepository;
use App\Repository\Product\BookRepository;
use App\Repository\Product\IAuthorRepository;
use App\Repository\Product\CategoryRepository;
use App\Repository\Product\IBookRepository;
use App\Repository\Product\ICategoryRepository;
use App\Repository\Product\PublisherRepository;
use App\Repository\Product\IPublisherRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IPublisherRepository::class, PublisherRepository::class);
        $this->app->bind(IAuthorRepository::class, AuthorRepository::class);
        $this->app->bind(IBookRepository::class, BookRepository::class);
        $this->app->bind(IUserDetailRepository::class, UserDetailRepository::class);
        $this->app->bind(ICartItemRepository::class, CartItemRepository::class);
    }
}
