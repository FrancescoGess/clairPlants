<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\CreateUser;


Route::view('/', 'welcome');

// web.php
Route::get('/admin/crea-utente', function () {
    return view('admin.create-user-page'); // una blade "contenitore"
})->middleware('auth')->name('admin.create-user');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
