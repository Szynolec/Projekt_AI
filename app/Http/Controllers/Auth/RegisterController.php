<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    // Wyświetl formularz rejestracji
    public function index()
    {
        return view('/register');
    }

    // Obsłuż proces rejestracji
    protected function register(Request $request)
{
    // Walidacja danych rejestracji
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'first_name' => 'required',
        'last_name' => 'required',
        'phone_number' => 'required|digits:9',
        'address' => 'required',
    ], [
        'email.required' => 'Pole email jest wymagane.',
        'email.email' => 'Podany adres email jest nieprawidłowy.',
        'email.unique' => 'Podany adres email jest już zarejestrowany.',
        'password.required' => 'Pole hasło jest wymagane.',
        'password.min' => 'Hasło musi mieć minimum :min znaków.',
        'first_name.required' => 'Pole imię jest wymagane.',
        'last_name.required' => 'Pole nazwisko jest wymagane.',
        'phone_number.required' => 'Pole numer telefonu jest wymagane.',
        'phone_number.digits' => 'Numer telefonu musi składać się z 9 cyfr.',
        'address.required' => 'Pole adres jest wymagane.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }


    // Tworzenie nowego klienta
    $client = new User();
    $client->email = $request->email;
    $client->password = bcrypt($request->password);
    $client->name = $request->first_name;
    $client->last_name = $request->last_name;
    $client-> phone_number = $request->phone_number;
    $client-> address = $request->address;
    $client->role = 'user';

    // Zapisz nowego klienta w tabeli "klienci"
    $client->save();

    // Komunikat o udanej rejestracji
    $message = 'Rejestracja przebiegła pomyślnie. Możesz teraz się zalogować.';

    // Przekierowanie po udanej rejestracji
    return redirect()->route('login')->with('success_message', $message);
}

}
