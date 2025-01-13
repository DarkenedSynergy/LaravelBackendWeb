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
                <img src="{{ asset('storage/' . $item->image) }}" alt="Afbeelding van {{ $item->title }}" style="max-width: 200px; height: auto;">
            @endif

            <p>{{ \Illuminate\Support\Str::limit($item->content, 100) }}</p>
        </div>
    @endforeach

    {{-- Paginatie --}}
    {{ $news->links() }}
</div>
@endsection
