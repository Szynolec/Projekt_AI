<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // Wyświetl widok głównej strony
    public function index()
    {
        return view('main');
    }

}
