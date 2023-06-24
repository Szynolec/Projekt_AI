<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    // Wyświetl widok edycji zamówień
    public function index()
    {

        // Pobierz wszystkie zamówienia, których data jest późniejsza lub równa dzisiejszej dacie
        // Posortuj zamówienia według daty i godziny
        $appointment = Appointment::whereDate('date', '>=', now()->toDateString())
        ->orderBy('date')
        ->orderBy('hour')
        ->get();

        return view('edit', ['appointment' => $appointment]);
    }

    // Aktualizuj dane zamówienia
    public function update(Request $request, $id)
    {
        // Walidacja danych
        $validatedData = $request->validate([
            'date' => 'required|date|after:today',
            'hour' => 'required|numeric|min:8|max:16',
        ], [
            'date.required' => 'Pole data jest wymagane.',
            'date.date' => 'Podana wartość w polu data nie jest poprawną datą.',
            'date.after' => 'Data musi być późniejsza niż dzisiaj.',
            'hour.required' => 'Pole godzina jest wymagane.',
            'hour.numeric' => 'Pole godzina musi być liczbą.',
            'hour.min' => 'Minimalna wartość pola godzina to 8.',
            'hour.max' => 'Maksymalna wartość pola godzina to 16.',
        ]);

        // Sprawdzenie czy istnieje już zamówienie o podanej dacie i godzinie
        $existingAppointment = Appointment::where('date', $request->input('date'))
        ->where('hour', $request->input('hour'))
        ->first();

        if ($existingAppointment) {
            return redirect()->back()->withErrors(['appointment_exists' => 'Zamówienie o podanej dacie i godzinie już istnieje.'])->withInput();
        }

        // Znajdź zamówienie o podanym ID
        $appointment = Appointment::findOrFail($id);
        $appointment->date = $request->input('date');
        $appointment->hour = $request->input('hour');

        $appointment->save();

        return redirect()->back()->with('success', 'Zamówienie zostało zaktualizowane.');
    }

    // Usuń zamówienie
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->delete();

        return redirect()->back()->with('success', 'Zamówienie zostało usunięte.');
    }
}
