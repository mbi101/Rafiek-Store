<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Observers\BrandsObserver;
use App\Observers\CategoriesObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        foreach (config('permissions_list') as $entity => $permissionData) {
            Gate::define($entity, fn($user) => $user->hasAccess($entity));
            foreach ($permissionData['options'] as $action) {
                Gate::define("{$entity}.{$action}", fn($user) => $user->hasAccess($entity, $action));
            }
        }

        // observers
        Category::observe(CategoriesObserver::class);
        Brand::observe(BrandsObserver::class);
    }
}
