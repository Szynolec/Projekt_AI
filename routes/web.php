<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\EditController;

/*
| Web Routes
*/

// Trasa do strony głównej
Route::get('/main', [MainController::class, 'index'])->name('main');

// Trasa do wyświetlania i składania formularza wizyty
Route::get('/appoitment', [AppointmentController::class, 'index'])->name('appoitment');
Route::post('/appoitment', [AppointmentController::class, 'submit'])->name('appoitment');

// Trasa do wyświetlania oferty produktów
Route::get('/offer',[ProductsController::class,'index'])->name('offer');

// Trasa do logowania
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Trasa do wylogowania
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Trasa do rejestracji
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Trasa do profilu użytkownika
Route::get('/profile', [ProfilController::class, 'index'])->name('profile');
Route::put('/update-user', [ProfilController::class, 'update'])->name('updateUser');

// Trasa do edycji zamówienia
Route::get('/edit', [EditController::class, 'index'])->name('edit');
Route::put('/edit/{id}', [EditController::class, 'update'])->name('appointment.update');
Route::delete('/edit/{id}', [EditController::class, 'destroy'])->name('appointment.destroy');
