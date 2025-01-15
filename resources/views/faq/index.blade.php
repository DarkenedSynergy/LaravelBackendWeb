@extends('layouts.app')

@section('title', 'Veelgestelde Vragen')

@section('content')
    <div class="container">
        <h1>Veelgestelde Vragen</h1>

        @foreach($categories as $category)
            <h2>{{ $category->name }}</h2>
            <ul>
                @foreach($category->faqs as $faq)
                    <li>
                        <strong>Vraag:</strong> {{ $faq->question }} <br>
                        <strong>Antwoord:</strong> {{ $faq->answer }}
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection
