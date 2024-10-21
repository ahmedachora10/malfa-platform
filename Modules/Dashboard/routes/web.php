<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\ContactController;
use Modules\Dashboard\Http\Controllers\DashboardController;
use Modules\Dashboard\Http\Controllers\OurServiceController;
use Modules\Dashboard\Http\Controllers\SettingController;
use Modules\Dashboard\Http\Controllers\SubscriberController;
use Modules\Dashboard\Livewire\Containers\Activities;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware(SetLocale::class)
    ->group( function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('our-services', OurServiceController::class)
            ->parameters('ourService');

        Route::resource('subscribers', SubscriberController::class)->only(['index', 'destroy'])->names('subscribers');

        Route::resource('contact', ContactController::class)->only(['index', 'destroy'])->names('contact');

        Route::controller(SettingController::class)
            ->prefix('settings')
            ->name('settings.')
            ->group(function () {
                Route::get('/{section?}', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
            });

        Route::get('activities', Activities::class)->name('activities.index');
    });




    // Route::resource('our-services', OurServiceController::class)
    // ->parameters('ourService')
    // ->names('our-services');


});


Route::get('switch-theme', function () {
    $theme = request()->session()->get('theme', 'light');

    // Toggle between 'light' and 'dark' themes
    $newTheme = ($theme === 'light') ? 'dark' : 'light';

    // Store the new theme in the session
    request()->session()->put('theme', $newTheme);

    return redirect()->back();
})->name('switch.theme');