@vite('resources/css/admin.css')
@vite('resources/js/app.js')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
</head>
<body>

    <!-- Header Section -->
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.news.index') }}">Nieuws beheren</a></li>
                <li><a href="{{ route('tags.index') }}">Tags beheren</a></li>
                <li><a href="{{ route('admin.faq.index') }}">FAQ's beheren</a></li>
                <li><a href="{{ route('admin.users.index') }}">Gebruikers beheren</a></li>
            </ul>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Uitloggen</button>
            </form>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Aidan De Greef. Alle rechten voorbehouden.</p>
    </footer>

</body>
</html>
