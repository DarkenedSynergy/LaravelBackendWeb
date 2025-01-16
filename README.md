# Paardensite Backend Web

## Overzicht van het Project

Dit project is de backend voor een website die gericht is op paarden. De applicatie behandelt verschillende soorten inhoud, zoals nieuws, gebruikersprofielen, veelgestelde vragen (FAQ) en meer. Het is gebouwd met Laravel, een krachtig PHP-framework, en bevat functionaliteiten zoals gebruikersauthenticatie, een admin-dashboard en e-mailfunctionaliteit voor het contact opnemen met admins.

## Functies

- **Admin Dashboard**: Beheer van gebruikers, nieuws, tags en FAQ's.
- **Gebruikersbeheer**: Admins kunnen gebruikers bekijken, aanmaken, bewerken en verwijderen.
- **Nieuwsbeheer**: Admins kunnen nieuwsitems aanmaken, bewerken en verwijderen, terwijl gebruikers deze kunnen bekijken.
- **FAQ Sectie**: Admins kunnen FAQ's en categorieën beheren, gebruikers kunnen FAQ's bekijken.
- **Contactformulier**: Bezoekers kunnen een contactformulier invullen, en admins ontvangen een e-mail.

## Vereisten

Voordat je begint, zorg ervoor dat je het volgende hebt:

- PHP 8.x of hoger
- Composer
- MySQL (of een andere ondersteunde database)
- Laravel 8.x of hoger

## Installatie

Volg deze stappen om je ontwikkelomgeving in te stellen:

1. Clone de repository:
   ```bash
   https://github.com/DarkenedSynergy/LaravelBackendWeb.git
   ```
2. Installeer de afhankelijkheden via Composer:
   ```bash
   composer install
   ```
3. Kopieer het `.env.example` bestand naar `.env`:
   ```bash
   cp .env.example .env
   ```
4. Genereer de applicatiesleutel:
   ```bash
   php artisan key:generate
   ```
5. Stel je database in en werk het `.env` bestand bij met je databasegegevens:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=je_database_naam
   DB_USERNAME=je_database_gebruiker
   DB_PASSWORD=je_database_wachtwoord
   ```
6. Voer de database migraties uit:
   ```bash
   php artisan migrate
   ```
7. (Optioneel) Zaai de database met voorbeeldgegevens:
   ```bash
   php artisan db:seed
   ```
8. Start de lokale ontwikkelserver:
   ```bash
   php artisan serve
   ```
   De applicatie zou nu moeten draaien op `http://127.0.0.1:8000`.

## Testen

Om te controleren of alles correct werkt, voer de Laravel tests uit:

```bash
php artisan test
```

## Functies in Detail

### Admin Dashboard

- Admin gebruikers kunnen nieuws, FAQ's, tags en gebruikersaccounts bekijken en beheren.
- Admins kunnen records verwijderen of bijwerken, categorieën voor FAQ's beheren en tags aan nieuwsitems koppelen.

### Nieuwsbeheer

- Admins kunnen nieuwsitems aanmaken en bewerken.
- Gebruikers kunnen de lijst van nieuwsitems bekijken en de volledige inhoud lezen.

### Gebruikersbeheer

- Admins kunnen nieuwe gebruikers toevoegen, profielen bijwerken of gebruikers verwijderen.
- Gebruikers kunnen hun eigen profiel bekijken en bewerken.

### FAQ Beheer

- Admins kunnen nieuwe FAQ's aanmaken, bestaande FAQ's bewerken en verwijderen.
- Gebruikers kunnen FAQ's bekijken en antwoorden op veelgestelde vragen lezen.

### Contactformulier

- Bezoekers kunnen een contactformulier invullen, waarbij een e-mail naar de admins wordt gestuurd.
- Het formulier bevat velden voor naam, e-mail en bericht.

## Licentie

Dit project is open-source en beschikbaar onder de MIT Licentie.

## Erkenningen

- Laravel framework
- Composer
- MySQL voor databasebeheer
- Mailtrap voor het testen van e-mailfunctionaliteit

Als je vragen hebt of problemen tegenkomt, aarzel dan niet om me te contacteren!
