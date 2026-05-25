<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //* Assign a random existing category ID or create a new one if none exist (Products reference categories)
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'name' => fake()->words(3, true),
            'model_year' => fake()->numberBetween(2020, 2026),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(100, 5000),
            'stock' => fake()->numberBetween(0, 100),
            'image' => fake()->imageUrl(640, 480, 'products', true),
        ];
    }
}
