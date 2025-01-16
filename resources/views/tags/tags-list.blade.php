@extends('layouts.admin')

@section('title', 'Tags beheren')

@section('content')
<div class="container">
    <h1>Tags beheren</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <button href="{{ route('tags.create') }}" class="btn btn-primary">Nieuwe tag toevoegen</button>

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
                        <button href="{{ route('tags.edit', $tag) }}" class="btn btn-warning">Bewerken</button>
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
<div class="pagination-container">
        {{ $tags->links() }}
    </div>

</div>
@endsection
