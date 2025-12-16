<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Student\StudentController;
use Modules\TripBooking\src\Http\Controllers\Student\UpdateStudentController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for student
        Route::prefix('student')->group(function(){
            Route::get('/', [StudentController::class, 'index'])->name('student_index');
            Route::get('/edit/{id?}', [UpdateStudentController::class, 'create'])->name('student_edit');
            Route::post('update', [UpdateStudentController::class, 'store'])->name('student_update');
            Route::get('delete/{id}', [StudentController::class, 'destroy'])->name('student_delete');
            
            // Xuất dữ liệu sinh viên
            Route::get('export', [StudentController::class, 'export'])->name('student_export');
        });
    });
});
