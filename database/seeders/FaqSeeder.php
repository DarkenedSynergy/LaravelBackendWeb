<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Voeg FAQ's toe onder de juiste categorieën
        Faq::create([
            'question' => 'Hoe maak ik een nieuw account aan?',
            'answer' => 'Klik op de knop "Registreren" op de homepage en vul je gegevens in.',
            'category_id' => 1 // Accountbeheer
        ]);

        Faq::create([
            'question' => 'Hoe reset ik mijn wachtwoord?',
            'answer' => 'Klik op "Wachtwoord vergeten?" op de inlogpagina en volg de stappen.',
            'category_id' => 1 // Accountbeheer
        ]);

        Faq::create([
            'question' => 'Mijn scherm is zwart, wat moet ik doen?',
            'answer' => 'Probeer de applicatie opnieuw op te starten en controleer je internetverbinding.',
            'category_id' => 2 // Technische Ondersteuning
        ]);

        Faq::create([
            'question' => 'Hoe kan ik betalen voor mijn abonnement?',
            'answer' => 'Ga naar "Betalingsinstellingen" in je profiel en kies een betaalmethode.',
            'category_id' => 4 // Betalingen en Facturatie
        ]);

        Faq::create([
            'question' => 'Wat is het verschil tussen een gratis en premium account?',
            'answer' => 'Met een premium account krijg je toegang tot exclusieve functies zoals ...',
            'category_id' => 3 // Algemene Vragen
        ]);
    }
}
