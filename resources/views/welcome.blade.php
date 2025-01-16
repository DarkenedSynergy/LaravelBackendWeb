@extends('layouts.app')

@section('title', 'Welkom')

@section('content')
    <div class="welcome-container">

        <main class="main-content">
            <h1 class="title">Welkom op de site!</h1>
            <p class="intro">Ontdek nieuws, veelgestelde vragen en meer over paarden. Maak je profiel aan of bekijk de FAQ's.</p>

            <div class="cta-buttons">
                <a href="{{ route('news.index') }}" class="btn">Bekijk Nieuws</a>
                <a href="{{ route('faq.index') }}" class="btn">Bekijk FAQ's</a>
            </div>
        </main>


    </div>
@endsection

@section('styles')
    <style>
        .welcome-container {
            background-color: #f5f5dc; /* Beige achtergrond */
            color: #5a3f35; /* Donkerbruin voor tekst */
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #d6a46f; /* Lichtbruin voor header */
            padding: 1rem;
        }

        .navbar .nav-list {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 0;
        }

        .navbar .nav-list li a,
        .navbar .nav-list li button {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            background-color: #7f5539; /* Medium bruin */
        }

        .navbar .nav-list li a:hover,
        .navbar .nav-list li button:hover {
            background-color: #5a3f35; /* Donkerder bruin bij hover */
        }

        .main-content {
            text-align: center;
            padding: 4rem 1rem;
        }

        .title {
            font-size: 3rem;
            color: #7f5539; /* Medium bruin */
        }

        .intro {
            font-size: 1.25rem;
            color: #5a3f35; /* Donkerbruin */
            margin: 20px 0;
        }

        .cta-buttons {
            margin-top: 2rem;
        }

        .btn {
            background-color: #d6a46f; /* Lichtbruin */
            color: white;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 1rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #c28f63; /* Donkerder lichtbruin bij hover */
        }

        .footer {
            background-color: #d6a46f; /* Lichtbruin voor footer */
            padding: 1rem;
            text-align: center;
            color: white;
        }
    </style>
@endsection
