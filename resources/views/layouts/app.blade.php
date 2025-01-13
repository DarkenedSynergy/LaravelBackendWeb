<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Paardensite')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('news.index') }}">Nieuws</a></li>
                <li><a href="#">Profiel</a></li>
                <li><a href="#">Contact</a></li>
                <li>
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Uitloggen</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Inloggen</a>
                    @endauth
                </li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Paardensite. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
