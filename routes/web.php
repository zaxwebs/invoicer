<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
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
	Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
	Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
	Route::get('/invoices/{invoice:invoice_number}', [InvoiceController::class, 'show'])->name('invoices.show');
	Route::patch('/invoices/{invoice}/status', [InvoiceController::class, 'updateStatus'])
		->name('invoices.update-status');
	Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
	Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
	Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
	Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
	Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
	Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
	Route::delete('notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
	Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
	Route::patch('/settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__ . '/auth.php';
