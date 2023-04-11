<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Receiver\DashboardController;
use App\Http\Controllers\Receiver\ProfileController;
use App\Http\Controllers\Receiver\VerificationApplicationController;
use App\Http\Controllers\Receiver\DonationRequestController;

Route::middleware('auth')->group(function () {

    Route::group(["prefix" => "receiver", "middleware" => "isReceiver"], function(){

        //dashboard controller
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('receiver.dashboard');
        //Route::get('/dashboard', 'DashboardController@index')->name('receiver.dashboard');

        Route::get('/account', 'AccountController@index')->name('receiver.account');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('receiver.profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('receiver.profile.update');

        Route::post('/verification/apply', [VerificationApplicationController::class, 'save'])->name('receiver.verification.apply');

        #middleware is user verified
        Route::group(["middleware" => 'isUserVerified'], function(){
            Route::get('/donations/request/new', [DonationRequestController::class, 'requestNew'])->name('receiver.donations.request_new');
            Route::post('/donations/request/new', [DonationRequestController::class, 'storeRequest'])->name('receiver.donations.store_request');
        });


    });

    
});