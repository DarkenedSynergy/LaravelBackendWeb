@extends('layouts.admin')

@section('title', 'Nieuwe tag toevoegen')

@section('content')
<div class="container">
    <h1>Nieuwe tag toevoegen</h1>

    <form method="POST" action="{{ route('tags.store') }}">
        @csrf
        <div>
            <label for="name">Tagnaam</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Opslaan</button>
    </form>
</div>
@endsection
