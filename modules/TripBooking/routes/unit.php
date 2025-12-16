<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Unit\UnitController;
use Modules\TripBooking\src\Http\Controllers\Unit\UpdateUnitController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for unit
        Route::prefix('unit')->group(function(){
            Route::get('/', [UnitController::class, 'index'])->name('unit_index');
            Route::get('/edit/{id?}', [UpdateUnitController::class, 'create'])->name('unit_edit');
            Route::post('update', [UpdateUnitController::class, 'store'])->name('unit_update');
            Route::get('delete/{id}', [UnitController::class, 'destroy'])->name('unit_delete');
        });
    });
});
