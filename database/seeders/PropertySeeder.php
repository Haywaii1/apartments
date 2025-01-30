<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    public function run()
    {
        // Create a single hardcoded property
        Property::create([
            'title' => 'Cadogan',
            'image' => 'https://photos.zillowstatic.com/fp/21c6a3e6fb01aa15b3e22cc3badaea7f-cc_ft_576.jpg',
            'price' => 500000,
            'description' => 'A beautiful modern house with great amenities.',
        ]);

        // Generate 10 random properties
        Property::factory()->count(0)->create();
    }
}
