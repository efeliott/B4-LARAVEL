<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::all(); // Retrieve all users from the database.
        return view('users', ['users' => $users]); // Pass the users to the view.
    }

    // Méthode de modification d'utilisateur
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }
}
