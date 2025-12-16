<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Banner\BannerController;
use Modules\TripBooking\src\Http\Controllers\Banner\UpdateBannerController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for banner
        Route::prefix('banner')->group(function(){
            Route::get('/', [BannerController::class, 'index'])->name('banner_index');
            Route::get('/edit/{id?}', [UpdateBannerController::class, 'create'])->name('banner_edit');
            Route::post('update', [UpdateBannerController::class, 'store'])->name('banner_update');
            Route::get('delete/{id}', [BannerController::class, 'destroy'])->name('banner_delete');
        });
    });
});
