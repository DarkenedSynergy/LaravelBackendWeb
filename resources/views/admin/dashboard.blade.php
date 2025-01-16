@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-semibold text-amber-500 mb-6">Welkom op het Admin Dashboard</h1>
        <p class="text-lg text-white mb-6">Gebruik de onderstaande links om je administratie te beheren.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Beheer FAQ's -->
            <div class="bg-blue-800 text-white p-6 rounded-lg shadow-lg hover:bg-blue-600 transition duration-300">
                <a href="{{ route('faq.index') }}" class="block text-xl font-bold mb-2">Bekijk FAQ's</a>
                <p class="text-sm">Beheer de veelgestelde vragen.</p>
            </div>

            <!-- Voeg een nieuwe FAQ toe -->
            <div class="bg-orange-500 text-white p-6 rounded-lg shadow-lg hover:bg-orange-400 transition duration-300">
                <a href="{{ route('admin.faq.create') }}" class="block text-xl font-bold mb-2">Voeg een nieuwe FAQ toe</a>
                <p class="text-sm">Voeg nieuwe veelgestelde vragen toe aan je website.</p>
            </div>

            <!-- Beheer Tags -->
            <div class="bg-green-700 text-white p-6 rounded-lg shadow-lg hover:bg-green-500 transition duration-300">
                <a href="{{ route('tags.index') }}" class="block text-xl font-bold mb-2">Beheer Tags</a>
                <p class="text-sm">Beheer de tags die je gebruikt in nieuwsitems en andere content.</p>
            </div>

            <!-- Beheer Gebruikers -->
            <div class="bg-purple-700 text-white p-6 rounded-lg shadow-lg hover:bg-purple-500 transition duration-300">
                <a href="{{ route('users.index') }}" class="block text-xl font-bold mb-2">Beheer Gebruikers</a>
                <p class="text-sm">Bekijk en beheer alle gebruikers van de website.</p>
            </div>

            <!-- Admin Dashboard Settings -->
            <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg hover:bg-gray-700 transition duration-300">
                <a href="{{ route('admin.dashboard') }}" class="block text-xl font-bold mb-2">Instellingen</a>
                <p class="text-sm">Pas de instellingen van het dashboard aan.</p>
            </div>
        </div>
    </div>
@endsection
