<?php

use Illuminate\Support\Facades\Route;
use Modules\Job\Http\Controllers\JobController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('job', JobController::class)->names('job');
});