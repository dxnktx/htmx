<?php

use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Http\Controllers\Bank\BankController;
use Modules\TripBooking\src\Http\Controllers\Bank\UpdateBankController;

Route::group(['middleware' => 'locale'], function() {

    /* Admin Middleware */
    Route::middleware(['auth'])->group(function() {

        // routes for bank
        Route::prefix('bank')->group(function(){
            Route::get('/', [BankController::class, 'index'])->name('bank_index');
            Route::get('/edit/{id?}', [UpdateBankController::class, 'create'])->name('bank_edit');
            Route::post('update', [UpdateBankController::class, 'store'])->name('bank_update');
            Route::get('delete/{id}', [BankController::class, 'destroy'])->name('bank_delete');
        });
    });
});
