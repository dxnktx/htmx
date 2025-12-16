<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Student\StudentController;
use Modules\TripBooking\src\Http\Controllers\Student\UpdateStudentController;
use Modules\TripBooking\src\Http\Controllers\Student\SearchStudentController;

use Modules\TripBooking\src\Http\Controllers\Trip\UpdateTripController;

Route::group(['middleware' => 'locale'], function () {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function () {

        // routes for student
        Route::prefix('student')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('student_index');
            Route::get('/search', [SearchStudentController::class, 'create'])->name('student_search');
            Route::get('/edit/{id?}', [UpdateStudentController::class, 'create'])->name('student_edit');
            Route::get('/approve/{id?}', [UpdateTripController::class, 'approve'])->name('trip_approve');
            Route::get('/reject/{id?}', [UpdateTripController::class, 'reject'])->name('trip_reject');
            Route::get('/reset/{id?}', [UpdateTripController::class, 'reset'])->name('trip_reset');
            Route::post('update', [UpdateStudentController::class, 'store'])->name('student_update');
            Route::get('delete/{id}', [StudentController::class, 'destroy'])->name('student_delete');

            // Xuất dữ liệu sinh viên
            Route::get('export', [StudentController::class, 'export'])->name('student_export');
        });
    });
});
