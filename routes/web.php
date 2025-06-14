<?php

use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::middleware('role.recruiter')->group(function () {
        Route::get('/dashboard', [JobOfferController::class, 'index'])->name('job-offers.index');
        Route::get('/job-offers/create', [JobOfferController::class, 'create'])->name('job-offers.create');
        Route::get('/job-offers/{jobOffer}/edit', [JobOfferController::class, 'edit'])->name('job-offers.edit');
        Route::get('/job-offers/{jobOffer}/applicants', [JobOfferController::class, 'applicants'])->name('job-offers.applicants');
        Route::get('/notifications', NotificationController::class)->name('notifications.index');
    });
});

Route::get('/job-offers/{jobOffer}', [JobOfferController::class, 'show'])->name('job-offers.show');

require __DIR__.'/auth.php';
