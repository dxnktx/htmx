<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Gallery\GalleryController;
use Modules\TripBooking\src\Http\Controllers\Gallery\UpdateGalleryController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for gallery
        Route::prefix('gallery')->group(function(){
            Route::get('/', [GalleryController::class, 'index'])->name('gallery_index');
            Route::get('/edit/{id?}', [UpdateGalleryController::class, 'create'])->name('gallery_edit');
            Route::post('update', [UpdateGalleryController::class, 'store'])->name('gallery_update');
            Route::get('delete/{id}', [GalleryController::class, 'destroy'])->name('gallery_delete');
        });
    });
});
