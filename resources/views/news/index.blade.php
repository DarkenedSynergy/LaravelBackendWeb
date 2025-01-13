@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')
<div class="container">
    <h1>Nieuwsitems</h1>

    @foreach($news as $item)
        <div class="news-item" style="border: 1px solid #ddd; padding: 1rem; margin-bottom: 1rem;">
            <h2><a href="{{ route('news.show', $item) }}">{{ $item->title }}</a></h2>
            <small>Gepubliceerd op: {{ $item->published_at ?? 'Onbekend' }}</small>

            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="Afbeelding van {{ $item->title }}" style="max-width: 200px;">
            @endif

            <p>{{ \Illuminate\Support\Str::limit($item->content, 100) }}</p>

            {{-- Actieknoppen --}}
            <div style="margin-top: 1rem;">
                @if(auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('news.edit', $item) }}" class="btn btn-primary">Bewerken</a>
                    <form action="{{ route('news.delete', $item) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?')">Verwijderen</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach

    {{-- Paginatie --}}
    <div style="margin-top: 2rem;">
        {{ $news->links() }}
    </div>
</div>
@endsection
