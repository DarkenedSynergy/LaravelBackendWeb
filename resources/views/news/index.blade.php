@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')
    <div class="container">
        <h1>Nieuws</h1>

        <div class="news-list">
            @foreach ($news as $newsItem)
                <div class="news-item">
                    <a href="{{ route('news.show', $newsItem) }}">
                        <h3>{{ $newsItem->title }}</h3>
                    </a>

                    @if($newsItem->image)
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="news-image">
                    @endif

                    <p>{{ \Illuminate\Support\Str::limit($newsItem->content, 100) }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
