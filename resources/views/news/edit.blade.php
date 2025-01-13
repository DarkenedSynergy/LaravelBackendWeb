@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuwsitem bewerken</h1>
    <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titel</label>
            <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" required>
        </div>
        <div>
            <label for="content">Inhoud</label>
            <textarea id="content" name="content" rows="5" required>{{ old('content', $news->content) }}</textarea>
        </div>
        <div>
            <label for="image">Afbeelding (optioneel)</label>
            <input type="file" id="image" name="image">
        </div>
        <div>
            <label for="published_at">Publicatiedatum (optioneel)</label>
            <input type="date" id="published_at" name="published_at" value="{{ old('published_at', $news->published_at) }}">
        </div>
        <button type="submit">Opslaan</button>
    </form>
</div>
@endsection
