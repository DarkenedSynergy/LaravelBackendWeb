<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Toon de lijst van gebruikers
    public function index()
    {
        // Haal alle gebruikers op
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Toon een formulier om een gebruiker toe te voegen
    public function create()
    {
        return view('users.create');
    }

    // Sla een nieuwe gebruiker op
    public function store(Request $request)
    {
        // Validatie voor nieuwe gebruiker
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        ]);

        // Maak een nieuwe gebruiker aan
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Encrypt het wachtwoord
            'is_admin' => $request->is_admin ?? 0,  // Voeg admin-rechten toe (standaard is 0)
        ]);

        return redirect()->route('users.index')->with('success', 'Gebruiker toegevoegd!');
    }

    // Toon een formulier om een gebruiker te bewerken
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Werk een gebruiker bij
    public function update(Request $request, User $user)
    {
        // Validatie voor het bewerken van een gebruiker
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',  // Only require password if it's being updated
            'is_admin' => 'nullable|boolean',  // Validate is_admin as a boolean
        ]);

        // Start updating the user data
        $user->name = $request->name;
        $user->email = $request->email;

        // If a new password is provided, update it
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Encrypt the new password
        }

        // Update 'is_admin' field properly
        $user->is_admin = $request->is_admin ?? $user->is_admin; // Only change if 'is_admin' is present

        // Save the updated user
        $user->save();

        return redirect()->route('users.index')->with('success', 'Gebruiker bijgewerkt!');
    }


    // Verwijder een gebruiker
    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Gebruiker verwijderd!');
    }
}
