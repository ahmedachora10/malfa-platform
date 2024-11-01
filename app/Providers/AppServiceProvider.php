<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Facades\Module;

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
        app()->singleton('settings', fn() => Setting::getAllSettings());

        // foreach (Module::allEnabled() as $module) {
        //     $modulePath = $module->getPath() . '/routes/web.php';

        //     if (file_exists($modulePath)) {
        //         Route::middleware(['web'])
        //             ->prefix('{locale}')
        //             ->where(['locale' => '[a-zA-Z]{2}'])
        //             ->group($modulePath);
        //     }
        // }
    }
}