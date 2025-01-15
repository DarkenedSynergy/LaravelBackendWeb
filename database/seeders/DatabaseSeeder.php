<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
     public function run()
        {
            // Voeg de seeders toe die we willen draaien
            $this->call([
                UserSeeder::class,
                TagSeeder::class,
                NewsSeeder::class,
                CategorySeeder::class,
                FaqSeeder::class,
            ]);
        }
}
