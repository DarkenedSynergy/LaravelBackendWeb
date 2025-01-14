<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Voeg hier je CSS toe -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #343a40;
            color: white;
            padding: 1rem 2rem;
        }
        header nav ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            margin: 0;
            padding: 0;
        }
        header nav ul li {
            display: inline;
        }
        header nav ul li a {
            color: white;
            text-decoration: none;
            padding: 0.5rem;
            border-radius: 4px;
        }
        header nav ul li a:hover {
            background-color: #495057;
        }
        header nav ul li form button {
            background: none;
            color: white;
            border: none;
            cursor: pointer;
        }
        header nav ul li form button:hover {
            text-decoration: underline;
        }
        main {
            padding: 2rem;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('news.index') }}">Nieuws beheren</a></li>
                <li><a href="{{ route('tags.index') }}">Tags beheren</a></li>
                <li><a href="{{ route('users.index') }}">Gebruikers beheren</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
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
        <p>&copy; 2025 Paardensite. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
