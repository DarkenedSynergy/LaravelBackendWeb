@extends('layouts.Admin')

@section('title', 'Gebruiker bewerken')

@section('content')
<div class="container">
    <h1>Gebruiker bewerken</h1>
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
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
            <label for="is_admin">Is Admin</label><br>

            <!-- Radio Button voor Geen Admin -->
            <input type="radio" id="is_admin_false" name="is_admin" value="false" {{ $user->is_admin ? '' : 'checked' }}>
            <label for="is_admin_false">Nee</label>

            <!-- Radio Button voor Admin -->
            <input type="radio" id="is_admin_true" name="is_admin" value="true" {{ $user->is_admin ? 'checked' : '' }}>
            <label for="is_admin_true">Ja</label>
        </div>




        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>

    {{-- Verwijder de gebruiker --}}
    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijderen</button>
    </form>
</div>
@endsection
