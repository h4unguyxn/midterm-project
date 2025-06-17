<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowRecordController;
use App\Http\Controllers\StudentController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::resource('books', BookController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('borrow-records', BorrowRecordController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
});
