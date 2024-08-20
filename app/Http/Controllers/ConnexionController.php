<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ConnexionController extends Controller
// {
//     public function formulaire()
//     {
//         return view('connexion');
//     }

//     public function traitement()
//     {
//         return 'Traitement de formulaire de connexion';
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ConnexionController extends Controller
{
    // Affiche la vue de connexion
    public function showLoginForm()
    {
        return view('login');
    }

    // Gère la soumission du formulaire de connexion
    public function login(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Authentifier l'utilisateur
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Rediriger vers la page d'accueil ou autre
            return redirect()->intended('home');
        }

        // Si échec de l'authentification
        return back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas.',
        ]);
    }

    // Déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
