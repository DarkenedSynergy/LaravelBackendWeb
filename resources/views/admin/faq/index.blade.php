@extends('layouts.admin')

@section('title', 'Beheer FAQ\'s')

@section('content')
    <div class="container">
        <h1>FAQ's beheren</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <button href="{{ route('admin.faq.create') }}" class="btn btn-primary mb-3">Nieuwe FAQ toevoegen</button>

        <table class="table">
            <thead>
                <tr>
                    <th>Vraag</th>
                    <th>Antwoord</th>
                    <th>Categorie</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                    <tr>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>{{ $faq->category->name }}</td>

                        <td>
                            <button href="{{ route('admin.faq.edit', $faq) }}" class="btn btn-warning">Bewerken</button>
                            <form action="{{ route('admin.faq.delete', $faq) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze FAQ wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Geen FAQ's gevonden.</td> <!-- Adjusted colspan for new column -->
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
