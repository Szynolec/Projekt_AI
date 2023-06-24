<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;

class ProfilController extends Controller
{
    // Wyświetl widok profilu użytkownika
    public function index()
    {
        // Pobierz zalogowanego użytkownika
        $user = Auth::user();

        // Pobierz wizyty użytkownika, które są planowane na przyszłość
        $appointments = Appointment::where('id_user', $user->id)
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('hour')
            ->get();

        // Przekazanie danych do widoku "profile"
        return view('profile', compact('appointments'));
    }

    // Aktualizuj dane użytkownika
    public function update(Request $request)
    {
        // Pobierz zalogowanego użytkownika
        $user = Auth::user();

        // Walidacja danych
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|digits:9',
            'address' => 'required',
            'current_password' => 'required',
            'new_password' => 'nullable|min:6',
        ], [
            'email.required' => 'Pole email jest wymagane.',
            'email.email' => 'Podany adres email jest nieprawidłowy.',
            'email.unique' => 'Podany adres email jest już zarejestrowany.',
            'name.required' => 'Pole imię jest wymagane.',
            'last_name.required' => 'Pole nazwisko jest wymagane.',
            'phone_number.required' => 'Pole numer telefonu jest wymagane.',
            'phone_number.digits' => 'Numer telefonu musi składać się z 9 cyfr.',
            'address.required' => 'Pole adres jest wymagane.',
            'current_password.required' => 'W celu zmiany danych to pole musi być wypełnione',
            'new_password.min' => 'Nowe hasło musi mieć minimum :min znaków.'
        ]);

        // Aktualizuj dane użytkownika
        $user->email = $validatedData['email'];
        $user->name = $validatedData['name'];
        $user->last_name = $validatedData['last_name'];
        $user->phone_number = $validatedData['phone_number'];
        $user->address = $validatedData['address'];

        // Sprawdzenie poprawności podanego obecnego hasła
        if ($request->filled('current_password') && Hash::check($request->input('current_password'), $user->password)) {
            // Jeśli podano nowe hasło, zaktualizuj je i zahashuj
            if ($request->filled('new_password')) {
                $validatedData = $request->validate([
                    'new_password' => 'min:6',
                ]);
                $user->password = Hash::make($validatedData['new_password']);
            }

            // Zapisz zmiany w bazie danych
            $user->save();

            return redirect()->back()->with('success', 'Dane użytkownika zostały zaktualizowane.');
        } elseif (!$request->filled('current_password')) {
            // Jeśli nie podano obecnego hasła, zapisz zmiany w bazie danych
            $user->save();

            return redirect()->back()->with('success', 'Dane użytkownika zostały zaktualizowane.');
        } else {
            // Jeśli podano niepoprawne obecne hasło, zwróć błąd
            return redirect()->back()->withErrors(['current_password' => 'Podane hasło jest niepoprawne.']);
        }
    }
}
