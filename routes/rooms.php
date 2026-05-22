<?php

use App\Http\Controllers\Rooms\Index;
use App\Http\Controllers\Rooms\Invite;
use App\Http\Controllers\Rooms\View;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::prefix('rooms')
        ->as('rooms.')
        ->namespace('')
        ->group(function () {
            Route::get('', Index::class)->name('index');
            Route::get('{room}', View::class)->name('view');
            Route::get('invite/{invited_by}/{room}', [Invite::class, 'index'])->name('invite_link');
        });
});
