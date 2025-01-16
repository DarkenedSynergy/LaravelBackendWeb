@extends('layouts.app')

@section('title', 'Veelgestelde Vragen')

@section('content')
    <div class="faq-container">
        <h1>Veelgestelde Vragen</h1>

        @foreach($categories as $category)
            <div class="faq-category">
                <h2>{{ $category->name }}</h2>

                @foreach($category->faqs as $faq)
                    <div class="faq-item">
                        <div class="question">
                            {{ $faq->question }}
                        </div>
                        <div class="answer">
                            {{ $faq->answer }}
                        </div>

                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
