<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'img' => fake()->name(),
            'name' => fake()->name(),
            'desc' => fake()->url(),
            'price' => fake()->randomDigit(),
            'category_id' => 1,
        ];
    }
}
