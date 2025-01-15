<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Voeg hier je nieuwsitems toe
        News::create([
            'title' => 'Sample News',
            'content' => 'This is a test news item.',
            'published_at' => now(),
            'user_id' => 1,
        ]);
    }
}
