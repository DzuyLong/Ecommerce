<?php

namespace App\Providers;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use App\Repositories\ProductsRepository;
use App\Repositories\Interfaces\ProductCategoryReponsitoryInterface;
use App\Repositories\ProductCategoryReponsitory;
use App\Repositories\Interfaces\ProductInventoryReponsitoryInterface;
use App\Repositories\ProductInventoryReponsitory;
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
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(ProductCategoryReponsitoryInterface::class, ProductCategoryReponsitory::class);
        $this->app->bind(ProductInventoryReponsitoryInterface::class, ProductInventoryReponsitory::class);
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
