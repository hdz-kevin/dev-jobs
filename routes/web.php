<?php

use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [JobOfferController::class, 'index'])->middleware(['auth', 'verified'])->name('job-offers.index');
Route::get('/job-offers/create', [JobOfferController::class, 'create'])->middleware(['auth', 'verified'])->name('job-offers.create');
Route::get('/job-offers/{jobOffer}/edit', [JobOfferController::class, 'edit'])->middleware(['auth', 'verified'])->name('job-offers.edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
