<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Contact\ContactController;
use Modules\TripBooking\src\Http\Controllers\Contact\UpdateContactController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for contact
        Route::prefix('contact')->group(function(){
            Route::get('/', [ContactController::class, 'index'])->name('contact_index');
            Route::get('/edit/{id?}', [UpdateContactController::class, 'create'])->name('contact_edit');
            Route::post('update', [UpdateContactController::class, 'store'])->name('contact_update');
            Route::get('delete/{id}', [ContactController::class, 'destroy'])->name('contact_delete');
        });
    });
});
