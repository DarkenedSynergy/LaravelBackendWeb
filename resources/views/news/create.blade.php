@extends('layouts.app')

@section('title', 'Nieuws toevoegen')

@section('content')
<div class="container">
    <h1>Nieuws toevoegen</h1>
    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Titel</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="content">Inhoud</label>
            <textarea id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
        </div>
        <div>
            <label for="image">Afbeelding (optioneel)</label>
            <input type="file" id="image" name="image">
        </div>
        <div>
            <label for="published_at">Publicatiedatum (optioneel)</label>
            <input type="date" id="published_at" name="published_at" value="{{ old('published_at') }}">
        </div>
        <div>
            <label for="tags">Tags</label>
            <select id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
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
