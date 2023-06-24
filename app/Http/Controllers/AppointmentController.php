<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Products;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Wyświetl formularz wizyty
    public function index()
    {
        return view('appointment');
    }

    // Obsłuż złożenie wizyty
    public function submit(Request $request)
    {
        // Walidacja danych
        $validatedData = $request->validate([
            'type' => 'required|string',
            'date' => 'required|date',
            'hour' => 'required',
        ], [
            'type.required' => 'Pole typ jest wymagane.',
            'type.string' => 'Pole typ musi być ciągiem znaków.',
            'date.required' => 'Pole data jest wymagane.',
            'date.date' => 'Podana wartość w polu data nie jest poprawną datą.',
            'hour.required' => 'Pole godzina jest wymagane.',
        ]);


         // Sprawdzenie, czy wybrany dzień to sobota lub niedziela
    $selectedDate = $validatedData['date'];
    $dayOfWeek = date('N', strtotime($selectedDate));
    if ($dayOfWeek == 6 || $dayOfWeek == 7) {
        // Jeśli wybrany dzień to sobota (6) lub niedziela (7)
        return redirect()->back()->withErrors(['date' => 'Wybrany dzień jest niedostępny.'])->withInput();
    }

    // Sprawdzenie, czy wybrana data jest większa od aktualnej daty
    $today = now()->toDateString();
    if ($validatedData['date'] <= $today) {
        return redirect()->back()->withErrors(['date' => 'Wybierz poprawną datę.'])->withInput();
    }

        // Sprawdzenie, czy istnieje już wizyta o podanej dacie i godzinie
        $existingAppointment = Appointment::where('date', $validatedData['date'])
            ->where('hour', $validatedData['hour'])
            ->first();

        if ($existingAppointment) {
            return redirect()->back()->withErrors(['hour' => 'Wybrana data i godzina są już zajęte.'])->withInput();
        }

        // Pobranie ID produktu na podstawie typu
        $product = Products::where('type', $validatedData['type'])->first();

        // Pobranie ID zalogowanego użytkownika
        $id_user = Auth::id();

        // Zapisanie wizyty do bazy danych
        $appointment = new Appointment();
        $appointment->id_product = $product->id;
        $appointment->id_user = $id_user;
        $appointment->date = $validatedData['date'];
        $appointment->hour = $validatedData['hour'];
        $appointment->save();

        // Przekierowanie po udanej rejestracji
        return redirect()->route('profile');
    }
}
