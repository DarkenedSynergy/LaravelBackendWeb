@extends('layouts.admin')

@section('title', 'Beheer Nieuws')

@section('content')
<div class="container">
    <h1>Nieuws beheren</h1>

    <a href="{{ route('admin.news.create') }}" class="btn btn-success mb-3">Nieuwe Nieuwsitem Toevoegen</a>

    <table class="table">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $newsItem)
                <tr>
                    <td>{{ $newsItem->title }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', $newsItem) }}" class="btn btn-primary">Bewerken</a>
                        <form action="{{ route('admin.news.delete', $newsItem) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
