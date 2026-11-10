<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;

Route::get('/', [ResepController::class, 'index'])
    ->name('resep.index');

Route::resource('resep', ResepController::class);