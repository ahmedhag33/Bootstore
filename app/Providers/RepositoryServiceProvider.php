<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\IBaseRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Product\CategoryRepository;
use App\Repository\Product\ICategoryRepository;

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
    }
}
