<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller {
    public function index(): View {
        $title = "Page d'accueil";
        return view('welcome', ['title' => $title]);
    }

    public function traiterFormulaire(Form $request)
    {
        // dd -> dump & die
        dd($request->validated());
    }

}
