@extends('layouts.admin')

@section('title', 'Gebruikersbeheer')

@section('content')
<div class="container">
    <h1>Gebruikerslijst</h1>

    {{-- Knop om een nieuwe gebruiker toe te voegen --}}
    <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-3">Nieuwe gebruiker toevoegen</a> <!-- Updated route -->

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
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Bewerken</a> <!-- Updated route -->
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;"> <!-- Updated route -->
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
