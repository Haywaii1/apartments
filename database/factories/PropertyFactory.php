<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word . ' Residence',
            'image' => 'https://source.unsplash.com/600x400/?house,apartment',
            'price' => $this->faker->numberBetween(100000, 1000000),
            'description' => $this->faker->sentence(10),
        ];
    }
}
