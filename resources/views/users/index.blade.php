@extends('layouts.admin')

@section('title', 'Gebruikersbeheer')

@section('content')
<div class="container">
    <h1>Gebruikerslijst</h1>

    {{-- Knop om een nieuwe gebruiker toe te voegen --}}
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Nieuwe gebruiker toevoegen</a>

    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Bewerken</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
