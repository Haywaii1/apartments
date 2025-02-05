<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to allow truncation
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Property::truncate(); // Clears all data and resets IDs
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert new properties
        Property::create([
            'title' => 'Cadogan',
            'image' => 'https://photos.zillowstatic.com/fp/21c6a3e6fb01aa15b3e22cc3badaea7f-cc_ft_576.jpg',
            'price' => 500000,
            'description' => 'A beautiful modern house with great amenities.',
        ]);

        Property::create([
            'title' => 'Milverton',
            'image' => 'https://photos.zillowstatic.com/fp/21c6a3e6fb01aa15b3e22cc3badaea7f-cc_ft_576.jpg',
            'price' => 600000,
            'description' => 'A luxury apartment in a prime location.',
        ]);

        Property::create([
            'title' => 'Colony',
            'image' => 'https://photos.zillowstatic.com/fp/21c6a3e6fb01aa15b3e22cc3badaea7f-cc_ft_576.jpg',
            'price' => 700000,
            'description' => 'A modern home with an elegant touch.',
        ]);
    }
}
