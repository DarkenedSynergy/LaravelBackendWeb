@extends('layouts.admin')

@section('title', 'FAQ bewerken')

@section('content')
    <div class="container">
        <h1>FAQ bewerken</h1>

        <form method="POST" action="{{ route('admin.faq.update', $faq) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="question">Vraag</label>
                <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
            </div>

            <div class="form-group">
                <label for="answer">Antwoord</label>
                <textarea name="answer" class="form-control" required>{{ $faq->answer }}</textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Categorie</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection
