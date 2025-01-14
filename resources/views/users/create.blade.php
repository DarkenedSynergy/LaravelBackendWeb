@extends('layouts.admin')

@section('title', 'Nieuwe gebruiker toevoegen')

@section('content')
<div class="container">
    <h1>Nieuwe gebruiker toevoegen</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Bevestig wachtwoord</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="is_admin">Admin</label>
            <select name="is_admin" class="form-control">
                <option value="1">Ja</option>
                <option value="0" selected>Nee</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Opslaan</button>
    </form>
</div>
@endsection
