@extends('layouts.admin')

@section('title', 'Tag bewerken')

@section('content')
<div class="container">
    <h1>Tag bewerken</h1>

    <form method="POST" action="{{ route('tags.update', $tag) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Tagnaam</label>
            <input type="text" id="name" name="name" value="{{ old('name', $tag->name) }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Opslaan</button>
    </form>
</div>
@endsection
