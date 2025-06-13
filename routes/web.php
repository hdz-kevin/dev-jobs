<?php

use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [JobOfferController::class, 'index'])->middleware('role.recruiter')->name('job-offers.index');
    Route::get('/job-offers/create', [JobOfferController::class, 'create'])->name('job-offers.create');
    Route::get('/job-offers/{jobOffer}/edit', [JobOfferController::class, 'edit'])->name('job-offers.edit');

    Route::get('/notifications', NotificationController::class)->middleware('role.recruiter')->name('notifications.index');
});

Route::get('/job-offers/{jobOffer}', [JobOfferController::class, 'show'])->name('job-offers.show');

require __DIR__.'/auth.php';
