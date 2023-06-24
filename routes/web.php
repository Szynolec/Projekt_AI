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
Route::get('/appoitment', [AppointmentController::class, 'index'])->name('appoitment')->middleware('auth');
Route::post('/appoitment', [AppointmentController::class, 'submit'])->name('appoitment')->middleware('auth');

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
Route::get('/profile', [ProfilController::class, 'index'])->name('profile')->middleware('auth');
Route::put('/update-user', [ProfilController::class, 'update'])->name('updateUser')->middleware('auth');

// Trasa do edycji zamówienia
Route::get('/edit', [EditController::class, 'index'])->name('edit.index')->middleware('\App\Http\Middleware\AdminMiddleware::class');
Route::put('/edit/appointment/{id}', [EditController::class, 'update'])->name('edit.update')->middleware('\App\Http\Middleware\AdminMiddleware::class');
Route::delete('/edit/appointment/{id}', [EditController::class, 'destroy'])->name('edit.destroy')->middleware('\App\Http\Middleware\AdminMiddleware::class');

// Trasa do edycji uzytkownika
Route::get('/edit/user/{id}', [EditController::class, 'editUser'])->name('edit.user.edit')->middleware('\App\Http\Middleware\AdminMiddleware::class');
Route::put('/edit/user/{id}', [EditController::class, 'updateUser'])->name('edit.user.update')->middleware('\App\Http\Middleware\AdminMiddleware::class');
Route::delete('/edit/user/{id}', [EditController::class, 'destroyUser'])->name('edit.user.destroy')->middleware('\App\Http\Middleware\AdminMiddleware::class');

// Trasa do edycji produktu
Route::get('/edit/product/{id}', [EditController::class, 'editProduct'])->name('edit.product')->middleware('\App\Http\Middleware\AdminMiddleware::class');
Route::put('/edit/product/{id}', [EditController::class, 'updateProduct'])->name('edit.product.update')->middleware('\App\Http\Middleware\AdminMiddleware::class');
Route::delete('/edit/product/{id}', [EditController::class, 'destroyProduct'])->name('edit.product.destroy')->middleware('\App\Http\Middleware\AdminMiddleware::class');

// Trasa do dodawania produktu
Route::post('/edit/product', [EditController::class, 'storeProduct'])->name('edit.product.store')->middleware('\App\Http\Middleware\AdminMiddleware::class');



