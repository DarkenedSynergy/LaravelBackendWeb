@extends('layouts.admin')

@section('title', 'Nieuwe FAQ toevoegen')

@section('content')
    <div class="container">
        <h1>Nieuwe FAQ toevoegen</h1>

        <form method="POST" action="{{ route('faq.store') }}">
            @csrf

            <div class="form-group">
                <label for="question">Vraag</label>
                <input type="text" name="question" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="answer">Antwoord</label>
                <textarea name="answer" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Categorie</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection
