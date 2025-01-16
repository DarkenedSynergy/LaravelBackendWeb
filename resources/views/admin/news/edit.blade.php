@extends('layouts.app')

@section('title', 'Nieuwsitem bewerken')

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
            @if($news->image)
                <p>Huidige afbeelding:</p>
                <img src="{{ asset('storage/' . $news->image) }}" alt="Huidige afbeelding" style="max-width: 200px;">
            @endif
        </div>
        <div>
            <label for="published_at">Publicatiedatum</label>
            <input type="date" id="published_at" name="published_at" value="{{ old('published_at', $news->published_at) }}">
        </div>
        <div>
            <label for="tags">Tags</label>
            <select id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $news->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            <small>Selecteer een of meerdere tags</small>
        </div>
        <button type="submit">Opslaan</button>
    </form>
</div>
@endsection
