<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'category_id' => null,
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->paragraphs(2, true),
            'price' => $this->faker->numberBetween(10, 100),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'available' => true,
        ];
    }
}
