<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show all users (admin only).
     */
    public function index()
    {
        // Check if the user is an admin
        if (Auth::check() && Auth::user()->is_admin) {
            $users = User::all(); // Retrieve all users for admins
            return view('admin.users.index', compact('users'));
        }

        // Redirect non-admin users
        return redirect()->route('home')->with('error', 'Je hebt geen toegang tot gebruikersbeheer.');
    }

    /**
     * Show a specific user's details.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form to create a new user (admin only).
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store the new user in the database (admin only).
     */
    public function store(Request $request)
    {
        \Log::info('Store request data:', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'is_admin' => 'required|in:true,false', // Validate that only 'true' or 'false' is accepted
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => filter_var($request->is_admin, FILTER_VALIDATE_BOOLEAN), // Convert 'true'/'false' to boolean
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol aangemaakt.');
    }

    /**
     * Show the form to edit an existing user (admin only).
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update an existing user in the database (admin only).
     */
    public function update(Request $request, User $user)
    {
        \Log::info('Update request data:', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|confirmed|min:8',
            'is_admin' => 'required|in:true,false', // Ensure only valid values are accepted
        ]);

        $isAdmin = filter_var($request->is_admin, FILTER_VALIDATE_BOOLEAN);
        \Log::info('Converted is_admin:', ['is_admin' => $isAdmin]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $isAdmin,
        ]);

        \Log::info('Updated user:', $user->toArray());

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol bijgewerkt.');
    }

    /**
     * Delete a user from the database (admin only).
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol verwijderd!');
    }
}
