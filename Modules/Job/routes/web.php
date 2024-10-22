<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Modules\Job\Http\Controllers\JobController;

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


Route::prefix('{locale}')
->where(['locale' => '[a-zA-Z]{2}'])
->middleware(SetLocale::class)
    ->group( function () {
    Route::resource('jobs', JobController::class)->names('jobs');
});