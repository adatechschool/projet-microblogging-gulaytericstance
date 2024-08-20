<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
public function dashboard()
{
    $user = Auth::user(); // Récupère l'utilisateur authentifié
    return view('dashboard', compact('user')); // Passe l'utilisateur à la vue
}


   public function updateBiography(Request $request): RedirectResponse
{
    // Validation des données
    $request->validate([
        'biography' => 'required|string|max:1000', // Validation pour la biographie
    ]);

    // Récupération de l'utilisateur authentifié
    $user = Auth::user();
    $user->biography = $request->input('biography');
    

    // Redirection avec message de succès
    return Redirect::route('dashboard')->with('status', 'biography-updated');
}
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

      public function show($id)
    {
        // Récupérer l'utilisateur par son ID avec ses posts
        $user = User::with('posts')->findOrFail($id);

        // Passer l'utilisateur et ses posts à la vue
        return view('users.show', compact('user'));
    }

    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}