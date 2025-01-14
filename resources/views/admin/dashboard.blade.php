@extends('layouts.Admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welkom, {{ auth()->user()->name }}!</p>

    <div class="mt-4">
        <a href="{{ route('users.index') }}" class="btn btn-primary">Beheer Gebruikers</a>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Beheer Nieuws</a>
        <a href="{{ route('tags.index') }}" class="btn btn-info">Beheer Tags</a>
    </div>
</div>
@endsection
