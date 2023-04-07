<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Donor\DashboardController;

Route::middleware('auth')->group(function () {

    Route::group(["prefix" => "donor", "middleware" => "isDonor"], function(){

        //dashboard controller
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('donor.dashboard');
        //Route::get('/dashboard', 'DashboardController@index')->name('donor.dashboard');

        Route::get('/account', 'AccountController@index')->name('donor.account');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });

    
});