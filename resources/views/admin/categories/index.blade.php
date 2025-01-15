@extends('layouts.admin')

@section('title', 'Categorieën Lijst')

@section('content')
    <div class="container">
        <h1>Categorieën</h1>

        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Nieuwe Categorie Toevoegen</a>

        <ul class="list-group mt-4">
            @foreach($categories as $category)
                <li class="list-group-item">{{ $category->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
