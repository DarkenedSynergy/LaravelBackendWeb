@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h1>Welkom op het Admin Dashboard</h1>
        <p>Gebruik de onderstaande links om je administratie te beheren.</p>

        <ul>
            <li><a href="{{ route('faq.index') }}">Bekijk FAQ's</a></li>
            <li><a href="{{ route('faq.create') }}">Voeg een nieuwe FAQ toe</a></li>
            <li><a href="{{ route('tags.index') }}">Beheer Tags</a></li>
            <li><a href="{{ route('users.index') }}">Beheer Gebruikers</a></li>
        </ul>
    </div>
@endsection
