@extends('layouts.app')

@section('title', 'Nieuws toevoegen')

@section('content')
<div class="container">
    <h1>Nieuws toevoegen</h1>
    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Inhoud</label>
            <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Afbeelding (optioneel)</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="published_at">Publicatiedatum (optioneel)</label>
            <input type="date" id="published_at" name="published_at" class="form-control">
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select id="tags" name="tags[]" multiple class="form-control">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
