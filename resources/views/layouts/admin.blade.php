<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Voeg hier je CSS toe -->
</head>
<body>
    <header style="background-color: #343a40; color: #fff; padding: 1rem;">
        <nav>
            <ul style="list-style: none; display: flex; gap: 1rem;">
                <li><a href="{{ route('dashboard') }}" style="color: white; text-decoration: none;">Dashboard</a></li>
                <li><a href="{{ route('news.index') }}" style="color: white; text-decoration: none;">Nieuws beheren</a></li>
                <li><a href="{{ route('tags.index') }}" style="color: white; text-decoration: none;">Tags beheren</a></li>
                <li><a href="{{ route('users.index') }}" style="color: white; text-decoration: none;">Gebruikers beheren</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none; color:white; border:none; cursor:pointer;">Uitloggen</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <main style="padding: 2rem;">
        @yield('content')
    </main>
</body>
</html>
