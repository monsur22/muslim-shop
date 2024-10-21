<?php

namespace App\Providers;

use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\Interfaces\BrandServiceInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\SalesServiceInterface;
use App\Services\Interfaces\StoreInterface;
use App\Services\Interfaces\TransferServiceInterface;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\SalesService;
use App\Services\StoreService;
use App\Services\TransferService;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind the interface to the implementation
        $this->app->bind(BrandServiceInterface::class, BrandService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService ::class);
        $this->app->bind(StoreInterface::class, StoreService ::class);
        $this->app->bind(SalesServiceInterface::class, SalesService ::class);
        $this->app->bind(OrderServiceInterface::class, OrderService ::class);
        $this->app->bind(TransferServiceInterface::class, TransferService ::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url') . "/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
    }
}
