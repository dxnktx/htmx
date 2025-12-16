<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Department\DepartmentController;
use Modules\TripBooking\src\Http\Controllers\Department\UpdateDepartmentController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for department
        Route::prefix('department')->group(function(){
            Route::get('/', [DepartmentController::class, 'index'])->name('department_index');
            Route::get('/edit/{id?}', [UpdateDepartmentController::class, 'create'])->name('department_edit');
            Route::post('update', [UpdateDepartmentController::class, 'store'])->name('department_update');
            Route::get('delete/{id}', [DepartmentController::class, 'destroy'])->name('department_delete');
        });
    });
});
