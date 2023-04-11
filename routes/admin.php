<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\VerificationApplicationController;
use App\Http\Controllers\Admin\DonationRequestController;


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
        Route::get('/verification/applications/accept/{id}', [VerificationApplicationController::class, 'acceptApplication'])->name('admin.verification.applications.accept');
        Route::get('/verification/applications/reject/{id}', [VerificationApplicationController::class, 'rejectApplication'])->name('admin.verification.applications.reject');
        Route::get('/verification/applications/delete/{id}', [VerificationApplicationController::class, 'deleteApplication'])->name('admin.verification.applications.delete');
        Route::get('/donations/requests', [DonationRequestController::class, 'index'])->name('admin.donation.requests');
        Route::get('/donations/requests/get-index-data', [DonationRequestController::class, 'getIndexData'])->name('admin.donations.requests.index-data');
        Route::get('/donations/requests/view/{id}', [DonationRequestController::class, 'viewRequest'])->name('admin.donations.requests.view');
        
    });

    
});