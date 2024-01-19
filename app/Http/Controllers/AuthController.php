<?php
namespace App\Http\Controllers; // Assurez-vous que cette ligne est présente

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Valider les données reçues du formulaire
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Connecter l'utilisateur
        Auth::login($user);

        // Rediriger vers une page (par exemple, la page d'accueil)
        return redirect('/');
    }

    public function login(Request $request)
    {
        // Valider les données reçues du formulaire
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérifier les informations et connecter l'utilisateur
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Rediriger vers une page sécurisée (par exemple, le tableau de bord)
            return redirect()->intended('/');
        }

        // Renvoyer en arrière avec une erreur si les informations sont incorrectes
        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ]);
    }
}
