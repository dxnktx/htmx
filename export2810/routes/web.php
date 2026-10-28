<?php

use App\Http\Controllers\Admin\SurveyAdminController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Booking\BookingController;
use Modules\TripBooking\src\Http\Controllers\Booking\UpdateBookingController;

Route::get('/khao-sat', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/khao-sat/store', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/khao-sat/thanh-cong', [SurveyController::class, 'success'])->name('survey.success');
Route::get('/khao-sat/da-hoan-thanh', [SurveyController::class, 'alreadySubmitted'])->name('survey.already-submitted');

Route::middleware(['auth', 'permission:browse-dashboard'])->prefix('admin')->group(function () {
    Route::get('/khao-sat', [SurveyAdminController::class, 'index'])->name('admin.surveys.index');
    Route::delete('/khao-sat/{survey}', [SurveyAdminController::class, 'destroy'])->name('admin.surveys.destroy');
    Route::get('/khao-sat/export', [SurveyAdminController::class, 'export'])->name('admin.surveys.export');
});
