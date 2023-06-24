<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Wyświetl formularz logowania
    public function index()
    {
        return view('/login');
    }

    // Obsłuż logowanie użytkownika
    public function login(Request $request)
{
    // Walidacja danych logowania
    $request->validate([
        'email' => 'required|email',
        'password' => 'nullable|min:6'
    ], [
        'email.required' => 'Pole email jest wymagane.',
        'email.email' => 'Podany adres email jest nieprawidłowy.',
        'password.min' => 'Nowe hasło musi mieć minimum :min znaków.'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Użytkownik został pomyślnie zalogowany
        return redirect()->intended('/main');
    } else {
        // Nieudana próba logowania
        return redirect()->back()->withInput()->withErrors(['message' => 'Nieprawidłowy email lub hasło.']);
    }
}

// Wyloguj użytkownika
public function logout()
{
    Auth::logout();
    return redirect()->route('main');
}
}
