@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')
    <div class="container">
        <h1>Nieuws</h1>
        <ul>
            @foreach ($news as $newsItem)
                <li>
                    <a href="{{ route('news.show', $newsItem) }}">
                        <h3>{{ $newsItem->title }}</h3>
                    </a>
                    @if($newsItem->image)
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" style="max-width: 100%; height: auto;">
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection
