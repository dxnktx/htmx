<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Station\StationController;
use Modules\TripBooking\src\Http\Controllers\Station\UpdateStationController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for station
        Route::prefix('station')->group(function(){
            Route::get('/', [StationController::class, 'index'])->name('station_index');
            Route::get('/edit/{id?}', [UpdateStationController::class, 'create'])->name('station_edit');
            Route::post('update', [UpdateStationController::class, 'store'])->name('station_update');
            Route::get('delete/{id}', [StationController::class, 'destroy'])->name('station_delete');
        });
    });
});
