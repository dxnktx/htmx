<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Category\CategoryController;
use Modules\TripBooking\src\Http\Controllers\Category\UpdateCategoryController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for category
        Route::prefix('category')->group(function(){
            Route::get('/', [CategoryController::class, 'index'])->name('category_index');
            Route::get('/edit/{id?}', [UpdateCategoryController::class, 'create'])->name('category_edit');
            Route::post('update', [UpdateCategoryController::class, 'store'])->name('category_update');
            Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('category_delete');
        });
    });
});
