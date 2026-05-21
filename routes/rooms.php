<?php

use App\Http\Controllers\Rooms\Index;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::prefix('rooms')
        ->as('rooms.')
        ->namespace('')
        ->group(function () {
            Route::get('', Index::class)->name('index');
        });
});
