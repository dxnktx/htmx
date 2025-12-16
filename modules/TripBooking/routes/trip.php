<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Trip\TripController;
use Modules\TripBooking\src\Http\Controllers\Trip\UpdateTripController;
use Modules\TripBooking\src\Http\Controllers\Trip\SearchTripController;

Route::group(['middleware' => 'locale'], function () {

    // routes for trip
    Route::prefix('trip')->group(function () {
        Route::get('/create', [UpdateTripController::class, 'create']);
        Route::post('/create', [UpdateTripController::class, 'store'])->name('trip_create');
        Route::get('/detail/{mssv?}', [UpdateTripController::class, 'detail'])->name('trip_detail');
        Route::post('update', [UpdateTripController::class, 'store'])->name('trip_update');
    });

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function () {

        Route::prefix('trip')->group(function () {
            Route::get('/', [TripController::class, 'index'])->name('trip_index');
            Route::get('/search', [SearchTripController::class, 'create'])->name('trip_search');
            Route::get('/edit/{id?}', [UpdateTripController::class, 'create'])->name('trip_edit');
            Route::get('/approve/{id?}', [UpdateTripController::class, 'approve'])->name('trip_approve');
            Route::get('/reject/{id?}', [UpdateTripController::class, 'reject'])->name('trip_reject');
            Route::get('/reset/{id?}', [UpdateTripController::class, 'reset'])->name('trip_reset');
            Route::get('delete/{id}', [TripController::class, 'destroy'])->name('trip_delete');

            // Xuất dữ liệu chuyến đi
            Route::get('export', [TripController::class, 'export'])->name('trip_export');
            //->middleware('permission:export-trip');
        });
    });
});
