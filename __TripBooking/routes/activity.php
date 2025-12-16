<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Activity\ActivityController;
use Modules\TripBooking\src\Http\Controllers\Activity\UpdateActivityController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for activity
        Route::prefix('activity')->group(function(){
            Route::get('/', [ActivityController::class, 'index'])->name('activity_index');
            Route::get('/edit/{id?}', [UpdateActivityController::class, 'create'])->name('activity_edit');
            Route::post('update', [UpdateActivityController::class, 'store'])->name('activity_update');
            Route::get('delete/{id}', [ActivityController::class, 'destroy'])->name('activity_delete');
        });
    });
});
