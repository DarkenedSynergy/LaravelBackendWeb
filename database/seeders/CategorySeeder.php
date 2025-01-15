<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Voeg enkele categorieën toe die van toepassing zijn op FAQ's
        Category::create(['name' => 'Accountbeheer']);
        Category::create(['name' => 'Technische Ondersteuning']);
        Category::create(['name' => 'Algemene Vragen']);
        Category::create(['name' => 'Betalingen en Facturatie']);
    }
}
