<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\VerificationApplicationController;

Route::middleware('auth')->group(function () {

    Route::group(["prefix" => "admin", "middleware" => "isAdmin"], function(){

        //dashboard controller
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Route::get('/account', 'AccountController@index')->name('admin.account');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

        Route::get('/verification/applications', [VerificationApplicationController::class, 'index'])->name('admin.verification.applications');
        Route::get('/verification/applications/get-index-data', [VerificationApplicationController::class, 'getIndexData'])->name('admin.verification.applications.index-data');
        Route::get('/verification/applications/view/{id}', [VerificationApplicationController::class, 'viewApplication'])->name('admin.verification.applications.view');
    });

    
});