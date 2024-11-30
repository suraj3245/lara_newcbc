<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        // Set default string length for older MySQL versions
        Schema::defaultStringLength(191);

        // Use Bootstrap for pagination
        Paginator::useBootstrap();

        // Share global application title
        view()->composer('*', function ($view) {
            $view->with('APP_TITLE', 'CBC');
        });

        // Share menus only if the table exists
        if (Schema::hasTable('menus')) {
            try {
                // Cache menus for 60 minutes
                $menus = cache()->remember('menus', 60, function () {
                    return Menu::all();
                });
                view()->share('menus', $menus);
            } catch (\Exception $e) {
                // Log any unexpected errors
                Log::error('Error loading menus: ' . $e->getMessage());
                view()->share('menus', []);
            }
        }
    }
}
