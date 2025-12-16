<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Student\StudentController;
use Modules\TripBooking\src\Http\Controllers\Student\UpdateStudentController;
use Modules\TripBooking\src\Http\Controllers\Front\HomeController;
use Modules\TripBooking\src\Http\Controllers\Front\PostController;
use Modules\TripBooking\src\Http\Controllers\Front\ActivityController;
use Modules\TripBooking\src\Http\Controllers\Front\ContactController;
use Modules\TripBooking\src\Http\Controllers\Front\CategoryController;
use Modules\TripBooking\src\Http\Controllers\Front\DashboardController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for unit
        Route::prefix('dashboard')->group(function(){
            Route::get('/', [DashboardController::class, 'index'])
            ->middleware('permission:browse-dashboard')
            ->name('dashboard');
        });
    });

    Route::get('/', [HomeController::class, 'index'])->name('index');    
    Route::get('/gioi-thieu', [HomeController::class, 'intro'])->name('intro');
    Route::get('/thu-vien-hinh-anh', [HomeController::class, 'gallery'])->name('gallery');

    Route::get('/tin-tuc', [PostController::class, 'index'])->name('tin_tuc');
    Route::get('/tin-tuc/{slug}', [PostController::class, 'detail'])->name('tin_tuc_chi_tiet');
    Route::get('/hoat-dong', [ActivityController::class, 'index'])->name('hoat_dong');
    Route::get('/hoat-dong/{slug}', [ActivityController::class, 'detail'])->name('hoat_dong_chi_tiet');
    Route::get('/lien-he', [HomeController::class, 'contact'])->name('contact');
    Route::post('/lien-he/submit', [ContactController::class, 'submit'])->name('contact_submit');
    Route::get('/danh-muc/{slug}', [CategoryController::class, 'detail'])->name('category_detail');
});