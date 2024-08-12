<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinkerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CustomerController;

if (app()->environment('local')) {
	Route::get('/tinker', [TinkerController::class, 'index'])->name('tinker');
}

Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
	Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
	Route::get('/invoices/{invoice:invoice_number}', [InvoiceController::class, 'show'])->name('invoices.show');
	Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
	Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
	Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
	Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
	Route::patch('/settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__ . '/auth.php';
