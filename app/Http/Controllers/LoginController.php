<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers; //logique principale pour l'authentification des utilisateurs

    /**
     * Où rediriger les utilisateurs après la connexion.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Créer une nouvelle instance de contrôleur.
     *
     * @return void
     */
    public function __construct()  //constructeur de la classe LoginController
    {
        // Vérifie que le middleware 'guest' est bien défini
        $this->middleware('guest')->except('logout');
    }
}
