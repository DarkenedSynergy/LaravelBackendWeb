@vite('resources/css/app.css')
@vite('resources/js/app.js')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profiel')</title>


    <!-- Voeg jQuery en jQuery Validation toe bovenaan je pagina -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
</head>
<body>
    <header>
            <nav class="flex justify-between items-center p-4" style="background-color: #D2B48C; color: #333;">
                <ul class="flex gap-4">
                    <li><a href="{{ route('news.index') }}">Nieuws</a></li>
                    <li><a href="{{ route('profile.edit') }}">Profiel</a></li>
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/users">Gebruikers</a></li>

                    {{-- Alleen zichtbaar voor ingelogde admins --}}
                    @auth
                        @if(auth()->user()->is_admin)
                            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-600">Admin Dashboard</a></li>
                        @endif
                    @endauth
                </ul>

                @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="logout-btn">Uitloggen</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="login-btn">Inloggen</a>
                @endif
            </nav>

        </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy 2025 Aidan De Greef. Alle rechten voorbehouden.</p>
    </footer>


    <script>
    $(document).ready(function() {
        // Zorg ervoor dat de validatie op alle formulieren wordt toegepast
        $("form").each(function() {
            $(this).validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 255
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "[name='password']"  // Zorg ervoor dat het wachtwoord en de bevestiging gelijk zijn
                    },
                    is_admin: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Naam is verplicht",
                        maxlength: "Naam mag niet langer zijn dan 255 tekens"
                    },
                    email: {
                        required: "E-mail is verplicht",
                        email: "Voer een geldig e-mailadres in",
                        maxlength: "E-mail mag niet langer zijn dan 255 tekens"
                    },
                    password: {
                        required: "Wachtwoord is verplicht",
                        minlength: "Wachtwoord moet minimaal 8 tekens lang zijn"
                    },
                    password_confirmation: {
                        required: "Bevestig wachtwoord is verplicht",
                        minlength: "Bevestig wachtwoord moet minimaal 8 tekens lang zijn",
                        equalTo: "Wachtwoorden komen niet overeen"
                    },
                    is_admin: {
                        required: "Selecteer of de gebruiker admin is"
                    }
                },
                errorClass: "is-invalid", // Voeg een CSS klasse toe voor ongeldige invoer
                validClass: "is-valid", // Voeg een CSS klasse toe voor geldige invoer
                highlight: function(element) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element) {
                    $(element).addClass('is-valid').removeClass('is-invalid');
                }
            });
        });
    });
    </script>
</body>
</html>
