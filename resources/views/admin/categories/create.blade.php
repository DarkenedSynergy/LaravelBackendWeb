@extends('layouts.admin')

@section('title', 'Nieuwe Categorie Toevoegen')

@section('content')
    <div class="container">
        <h1>Nieuwe Categorie Toevoegen</h1>

        <form method="POST" action="{{ route('admin.category.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Categorie Naam</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection
