<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tags extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Tag::insert([
            ['name' => 'Dressuur', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Springen', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Eventing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Endurance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Paardenverzorging', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wedstrijden', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Stallen', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Training', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

}
