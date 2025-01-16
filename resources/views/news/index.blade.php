@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Nieuws</h1>

            <!-- Voeg de mogelijkheid om een nieuwsitem toe te voegen, enkel voor admins -->
            @auth
                @if(auth()->user()->is_admin) <!-- Alleen zichtbaar voor admins -->
                    <a class ="adminBtn" href="{{ route('admin.news.create') }}" class="btn btn-success">Nieuw Nieuwsitem</a>
                @endif
            @endauth
        </div>

        <!-- Zoekformulier -->
        <form method="GET" action="{{ route('news.index') }}" class="mb-4">
            <input type="text" name="search" placeholder="Zoek op titel, tags of auteur" class="form-control" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary mt-2">Zoeken</button>
        </form>

        <div class="news-list">
            @foreach ($news as $newsItem)
                <div class="news-item">
                    <a href="{{ route('news.show', $newsItem) }}">
                        <h3>{{ $newsItem->title }}</h3>

                        <!-- Afbeelding -->
                        @if($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="news-image">
                        @endif

                        <!-- Auteur -->
                        <small>Auteur: {{ $newsItem->user->name ?? 'Onbekend' }}</small><br>
                        <p>Registreer om de content te lezen!</p>

                        <!-- Tags -->
                        <div class="tags">
                            <strong>Tags:</strong>
                            @foreach($newsItem->tags as $tag)
                                <span class="tag">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
