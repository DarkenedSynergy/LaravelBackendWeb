<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profiel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Voeg jQuery en jQuery Validation toe bovenaan je pagina -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
</head>
<body>
    <header>
        <nav>
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

    <!-- Voeg het validatie-script hieronder toe, vlak voor het sluiten van de body-tag -->
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
