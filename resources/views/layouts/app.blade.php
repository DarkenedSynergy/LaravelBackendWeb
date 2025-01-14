<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profiel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <!-- Voeg hier navigatie toe -->
            <ul>
                <li><a href="{{ route('news.index') }}">Nieuws</a></li>
                <li><a href="{{ route('profile.edit') }}">Profiel</a></li>
                <li><a href="/contact">Contact</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Uitloggen</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>© 2025 Paardensite. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
