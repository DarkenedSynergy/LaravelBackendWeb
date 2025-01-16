<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show all users (admin only)
    public function index()
    {
        // Check if the user is an admin
        if (Auth::check() && Auth::user()->is_admin) {
            $users = User::all(); // Show all users for admins
            return view('admin.users.index', compact('users')); // Use admin view for admin users
        }

        // Show the users for normal users (no admin access)
        $users = User::all(); // or any other filtering you want for regular users
        return view('users.index', compact('users'));
    }

    // Show a specific user's details
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Create a new user (admin only)
    public function create()
    {
        // Admin-only logic can be handled by middleware
        return view('admin.users.create');
    }

    // Store the new user in the database (admin only)
    public function store(Request $request)
    {
        // Validate new user data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        ]);

        // Create new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User added!');
    }

    // Edit an existing user (admin only)
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update an existing user (admin only)
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'is_admin' => $request->is_admin ?? $user->is_admin,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker bijgewerkt!');
    }


    // Delete a user (admin only)
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker verwijdert!');
    }
}
