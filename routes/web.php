<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', fn() => redirect(status: 301)->to('/' . app()->getLocale()));

Route::view('/', 'welcome');

require __DIR__.'/auth.php';