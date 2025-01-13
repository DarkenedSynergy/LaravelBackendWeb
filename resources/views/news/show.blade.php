@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container">
    <h1>{{ $news->title }}</h1>
    @if($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="max-width: 100%; height: auto;">
    @endif
    <p>{{ $news->content }}</p>
    <small>Gepubliceerd op: {{ $news->published_at ?? 'Onbekend' }}</small>
</div>
@endsection
