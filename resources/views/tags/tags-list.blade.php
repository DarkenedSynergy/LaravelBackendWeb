@extends('layouts.admin')

@section('title', 'Tags beheren')

@section('content')
<div class="container">
    <h1>Tags beheren</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('tags.create') }}" class="btn btn-primary">Nieuwe tag toevoegen</a>

    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-warning">Bewerken</a>
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze tag wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Geen tags gevonden.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $tags->links() }}
</div>
@endsection
