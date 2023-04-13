<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Donor\DashboardController;
use App\Http\Controllers\Donor\ProfileController;
use App\Http\Controllers\Donor\VerificationApplicationController;
use App\Http\Controllers\Donor\DonationRequestController;

Route::middleware('auth')->group(function () {

    Route::group(["prefix" => "donor", "middleware" => "isDonor"], function(){

        //dashboard controller
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('donor.dashboard');
        //Route::get('/dashboard', 'DashboardController@index')->name('donor.dashboard');

        Route::get('/account', 'AccountController@index')->name('donor.account');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('donor.profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('donor.profile.update');

        Route::post('/verification/apply', [VerificationApplicationController::class, 'save'])->name('donor.verification.apply');

        #middleware is user verified
        Route::group(["middleware" => 'isUserVerified'], function(){
            Route::get('/donations/request/list', [DonationRequestController::class, 'index'])->name('donor.donations.list');
            Route::get('/donations/request/get-index-data', [DonationRequestController::class, 'getIndexData'])->name('donor.donations.get_index_data');
            Route::get('/donations/request/accept/{id}', [DonationRequestController::class, 'acceptDonationRequest'])->name('donor.donations.requests.accept');
            Route::get('/donations/requests/accepted/list', [DonationRequestController::class, 'acceptedRequestList'])->name('donor.donations.accepted_requests_list');
            Route::get('/donations/requests/accepted/get-index-data', [DonationRequestController::class, 'getAcceptedIndexData'])->name('donor.donations.accepted_requests_list.index_data');
        });

    });

    
});