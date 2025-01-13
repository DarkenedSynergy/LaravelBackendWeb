@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container">
    <h1>{{ $news->title }}</h1>

    @if($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="max-width: 100%; height: auto; margin-bottom: 1rem;">
    @endif

    <p>{{ $news->content }}</p>
    <small>Gepubliceerd op: {{ $news->published_at ?? 'Onbekend' }}</small>

    {{-- Actieknoppen --}}
    <div style="margin-top: 1rem;">
        @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ route('news.edit', $news) }}" class="btn btn-primary">Bewerken</a>
            <form action="{{ route('news.delete', $news) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?')">Verwijderen</button>
            </form>
        @endif
    </div>
</div>
@endsection
