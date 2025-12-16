<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Post\PostController;
use Modules\TripBooking\src\Http\Controllers\Post\UpdatePostController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for post
        Route::prefix('post')->group(function(){
            Route::get('/', [PostController::class, 'index'])
                ->middleware('permission:browse-post')
                ->name('post_index');
            Route::get('/edit/{id?}', [UpdatePostController::class, 'create'])
                ->middleware('permission:edit-post')
                ->name('post_edit');
            Route::post('update', [UpdatePostController::class, 'store'])
                ->middleware('permission:edit-post')
                ->name('post_update');
            Route::get('delete/{id}', [PostController::class, 'destroy'])
                ->middleware('permission:delete-post')
                ->name('post_delete');
        });
    });
});
