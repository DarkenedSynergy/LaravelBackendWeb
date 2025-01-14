@extends('layouts.Admin')

@section('title', 'Gebruiker bewerken')

@section('content')
<div class="container">
    <h1>Gebruiker bewerken</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="is_admin">Admin</label>
            <select name="is_admin" class="form-control">
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Ja</option>
                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Nee</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>

    {{-- Verwijder de gebruiker --}}
    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijderen</button>
    </form>
</div>
@endsection
