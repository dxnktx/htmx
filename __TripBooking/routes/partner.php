<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Partner\PartnerController;
use Modules\TripBooking\src\Http\Controllers\Partner\UpdatePartnerController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for partner
        Route::prefix('partner')->group(function(){
            Route::get('/', [PartnerController::class, 'index'])->name('partner_index');
            Route::get('/edit/{id?}', [UpdatePartnerController::class, 'create'])->name('partner_edit');
            Route::post('update', [UpdatePartnerController::class, 'store'])->name('partner_update');
            Route::get('delete/{id}', [PartnerController::class, 'destroy'])->name('partner_delete');
        });
    });
});
