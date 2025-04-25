<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    //deposit
    Volt::route('deposit', 'deposit')->name('user.deposit');

    //transaction
    Volt::route('transactions', 'transaction')->name('user.transaction');
});

//Admin level routes

Route::view('admin', 'admin')
    ->middleware(['admin', 'verified'])
    ->name('admin.dashboard');

Route::middleware(['admin'])->group(function () {
    Route::redirect('admin.settings', 'settings/profile');

    Volt::route('admin/settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('admin/settings/password', 'settings.password')->name('settings.password');
    Volt::route('admin/settings/appearance', 'settings.appearance')->name('settings.appearance');

    //users
    Volt::route('admin/users', 'admin.user.index')->name('admin.user.index');
    Volt::route('admin/users/{user}/edit', 'admin.user.edit')->name('admin.user.edit');

    //deposits
    Volt::route('admin/deposits', 'admin.deposit.index')->name('admin.deposit.index');
    Volt::route('admin/deposits/{transaction}/edit', 'admin.deposit.edit')->name('admin.deposit.edit');

    //transactions
    Volt::route('admin/transactions', 'admin.transaction')->name('admin.transaction');

});
require __DIR__.'/auth.php';