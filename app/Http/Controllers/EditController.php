<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;

class EditController extends Controller
{
    // Wyświetl widok edycji zamówień
    public function index()
    {
        // Pobierz wszystkie zamówienia, których data jest późniejsza lub równa dzisiejszej dacie
        // Posortuj zamówienia według daty i godziny
        $appointments = Appointment::whereDate('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('hour')
            ->get();

        // Pobierz tylko użytkowników o roli "user"
        $users = User::where('role', 'user')->get();

        // Pobierz wszystkie produkty
        $products = Products::all();

        return view('edit', compact('appointments', 'users', 'products'));
    }

// Aktualizuj dane zamówienia
public function update(Request $request, $id)
{
    // Walidacja danych
    $validatedData = $request->validate([
        'date' => 'required|date|after:today',
        'hour' => 'required|integer|min:8|max:16',
    ], [
        'date.required' => 'Pole data jest wymagane.',
        'date.date' => 'Podana wartość w polu data nie jest poprawną datą.',
        'date.after' => 'Data musi być późniejsza niż dzisiaj.',
        'hour.required' => 'Pole godzina jest wymagane.',
        'hour.integer' => 'Pole godzina musi być liczbą całkowitą.',
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

// Edytuj dane użytkownika
public function editUser($id)
{
    $user = User::findOrFail($id);
    return view('edit.edit_user', compact('user'));
}

// Aktualizuj dane użytkownika
public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'last_name' => 'required',
        'phone_number' => 'required|digits:9',
        'address' => 'required',
    ], [
        'name.required' => 'Pole imię jest wymagane.',
        'email.required' => 'Pole email jest wymagane.',
        'email.email' => 'Podana wartość w polu email nie jest poprawnym adresem email.',
        'email.unique' => 'Podany adres email jest już zajęty.',
        'last_name.required' => 'Pole nazwisko jest wymagane.',
        'phone_number.required' => 'Pole numer telefonu jest wymagane.',
        'phone_number.digits' => 'Numer telefonu musi składać się z 9 cyfr.',
        'address.required' => 'Pole adres jest wymagane.',
    ]);

    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->last_name = $validatedData['last_name'];
    $user->phone_number = $validatedData['phone_number'];
    $user->address = $validatedData['address'];
    $user->save();

    return redirect()->back()->with('success', 'Dane użytkownika zostały zaktualizowane.');
}

// Usuń użytkownika
public function destroyUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('success', 'Użytkownik został usunięty.');
}

// Edytuj dane produktu
public function editProduct($id)
{
    $product = Products::findOrFail($id);
    return view('edit.edit_product', compact('product'));
}

// Aktualizuj dane produktu
public function updateProduct(Request $request, $id)
{
    $product = Products::findOrFail($id);

    $validatedData = $request->validate([
        'type' => 'required',
        'img' => 'required',
        'des' => 'required',
        'cost' => 'required|numeric',
    ], [
        'type.required' => 'Pole typ jest wymagane.',
        'img.required' => 'Pole obraz jest wymagane.',
        'des.required' => 'Pole opis jest wymagane.',
        'cost.required' => 'Pole koszt jest wymagane.',
        'cost.numeric' => 'Pole koszt musi być liczbą.',
    ]);

    $product->type = $validatedData['type'];
    $product->img = $validatedData['img'];
    $product->des = $validatedData['des'];
    $product->cost = $validatedData['cost'];
    $product->save();

    return redirect()->back()->with('success', 'Dane produktu zostały zaktualizowane.');
}

// Usuń produkt
public function destroyProduct($id)
{
    $product = Products::findOrFail($id);
    $product->delete();

    return redirect()->back()->with('success', 'Produkt został usunięty.');
}

public function storeProduct(Request $request)
{
    $validatedData = $request->validate([
        'type' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:400',
        'description' => 'required',
        'cost' => 'required|numeric',
    ], [
        'type.required' => 'Pole typ jest wymagane.',
        'image.required' => 'Pole obraz jest wymagane.',
        'image.image' => 'Pole obraz musi być plikiem obrazu.',
        'image.mimes' => 'Pole obraz musi mieć format JPG, JPEG lub PNG.',
        'image.max' => 'Pole obraz nie może przekraczać 400 KB.',
        'description.required' => 'Pole opis jest wymagane.',
        'cost.required' => 'Pole koszt jest wymagane.',
        'cost.numeric' => 'Pole koszt musi być liczbą.',
    ]);

    $imageFile = $request->file('image');
    $imageName = $imageFile->getClientOriginalName();
    $imagePath = 'img/' . $imageName;

    // Przeniesienie pliku do katalogu public/img
    $imageFile->move('img', $imageName, 'public');

    $product = new Products();
    $product->type = $validatedData['type'];
    $product->img = $imageName;
    $product->des = $validatedData['description'];
    $product->cost = $validatedData['cost'];
    $product->save();

    return redirect()->back()->with('success', 'Produkt został dodany.');
}
}
