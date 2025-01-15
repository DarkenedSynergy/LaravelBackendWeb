@extends('layouts.app')

@section('title', $user->name . ' - Profiel')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}</h1>

        <p>Email: {{ $user->email }}</p>

        @if($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}'s profiel foto" style="max-width: 150px; height: auto;">
        @else
            <p>Geen profielfoto beschikbaar</p>
        @endif

       <!-- Toon de bio -->
           @if($user->bio)
               <h3>Bio</h3>
               <p>{{ $user->bio }}</p>
           @else
               <p>Geen bio beschikbaar</p>
           @endif
    </div>
@endsection
