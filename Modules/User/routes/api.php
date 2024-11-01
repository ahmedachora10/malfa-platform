<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\Api\ContactController;
use Modules\Dashboard\Http\Controllers\Api\OurServiceController;
use Modules\Dashboard\Http\Controllers\Api\SubscriberController;
use Modules\User\Http\Controllers\Api\AuthenticatedSessionController;
use Modules\User\Http\Controllers\UserController;

Route::middleware(['auth:api'])->group(function () {
    Route::controller(AuthenticatedSessionController::class)
        ->prefix('user')
        ->name('user.')
        ->group(function () {
            Route::post('profile', 'profile')->name('profile');
            Route::post('logout', 'logout')->name('logout');
            Route::post('refresh-token', 'refreshToken')->name('token.refresh');
        });
    });

Route::get('our-services', [OurServiceController::class, 'index'])->name('our-services.index');
Route::post('contact', ContactController::class)->name('contact.store');
Route::post('subscriber', SubscriberController::class)->name('subscriber.store');

Route::controller(AuthenticatedSessionController::class)
    ->name('auth.')
    ->group(function () {
        Route::post('login', 'login')->name('login');
        Route::post('register', 'register')->name('register');
    });
