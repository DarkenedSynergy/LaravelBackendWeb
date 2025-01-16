@vite('resources/css/admin.css')
@vite('resources/js/app.js')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header Section -->
    <header class="bg-gray-800 text-white p-4 shadow-md">
        <nav class="max-w-7xl mx-auto flex justify-between items-center">
            <ul class="flex gap-6">
                <li><a href="{{ route('admin.dashboard') }}" class="text-lg hover:text-yellow-300">Dashboard</a></li>
                <li><a href="{{ route('news.index') }}" class="text-lg hover:text-yellow-300">Nieuws beheren</a></li>
                <li><a href="{{ route('tags.index') }}" class="text-lg hover:text-yellow-300">Tags beheren</a></li>
                <li><a href="{{ route('admin.users.index') }}" class="text-lg hover:text-yellow-300">Gebruikers beheren</a></li>

            </ul>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="inline-block">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-md">Uitloggen</button>
            </form>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; 2025 Aidan De Greef. Alle rechten voorbehouden.</p>
    </footer>

</body>
</html>
