<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Show Jumping',
            'Dressage',
            'Eventing',
            'Horse Racing',
            'Barrel Racing',
            'Polo',
            'Equestrianism',
            'Therapeutic Riding',
            'Endurance Riding',
            'Saddlery',
            'Horse Training',
            'Horse Behavior',
            'Stable Management',
            'Equine Nutrition',
            'Hoof Care',
            'Horse Shows',
            'Gait Training',
            'Horseback Riding Lessons',
            'Equestrian Sports',
            'Tack and Equipment'
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
