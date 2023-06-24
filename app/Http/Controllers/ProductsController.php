<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // Wyświetla ofertę produktów.
    public function index()
    {
        $products = Products::all(); // Pobierz wszystkie produkty z bazy danych

        return view('offer', compact('products'));
    }
}
