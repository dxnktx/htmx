<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Post_type\Post_typeController;
use Modules\TripBooking\src\Http\Controllers\Post_type\UpdatePost_typeController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for post_type
        Route::prefix('post_type')->group(function(){
            Route::get('/', [Post_typeController::class, 'index'])->name('post_type_index');
            Route::get('/edit/{id?}', [UpdatePost_typeController::class, 'create'])->name('post_type_edit');
            Route::post('update', [UpdatePost_typeController::class, 'store'])->name('post_type_update');
            Route::get('delete/{id}', [Post_typeController::class, 'destroy'])->name('post_type_delete');
        });
    });
});
