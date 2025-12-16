<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Route\RouteController;
use Modules\TripBooking\src\Http\Controllers\Route\UpdateRouteController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for route
        Route::prefix('route')->group(function(){
            Route::get('/', [RouteController::class, 'index'])->name('route_index');
            Route::get('/edit/{id?}', [UpdateRouteController::class, 'create'])->name('route_edit');
            Route::post('update', [UpdateRouteController::class, 'store'])->name('route_update');
            Route::get('delete/{id}', [RouteController::class, 'destroy'])->name('route_delete');
        });
    });
});
