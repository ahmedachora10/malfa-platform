<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\ContactController;
use Modules\Dashboard\Http\Controllers\DashboardController;
use Modules\Dashboard\Http\Controllers\SettingController;
use Modules\Dashboard\Http\Controllers\SubscriberController;

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

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('contact', ContactController::class)->only(['index', 'destroy'])->names('contact');

    Route::resource('subscribers', SubscriberController::class)->only(['index', 'destroy'])->names('subscribers');

    Route::controller(SettingController::class)
        ->prefix('settings')
        ->name('settings.')
        ->group(function () {
            Route::get('/{section?}', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });
});


Route::get('switch-theme', function () {
    $theme = request()->session()->get('theme', 'light');

    // Toggle between 'light' and 'dark' themes
    $newTheme = ($theme === 'light') ? 'dark' : 'light';

    // Store the new theme in the session
    request()->session()->put('theme', $newTheme);

    return redirect()->back();
})->name('switch.theme');
