<?php

namespace App\Http\Controllers;

use App\Http\Requests\Form;   
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function store(Form $request)
    {
        $validatedData = $request->validated();

        return back()->with('success', 'Merci pour votre message. Nous vous contacterons bientôt!');
    }
}
