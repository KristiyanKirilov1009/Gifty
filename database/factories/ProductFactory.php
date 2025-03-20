<?php

namespace Database\Factories;

use App\Enums\Availability;
use App\Enums\Condition;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'category_id' => Category::factory(),
            'sku' => Str::random('32'),
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'availability' => fake()->randomElement(Availability::cases())->value,
            'quantity' => 1,
            'minimum' => 1,
            'is_hidden' => fake()->boolean(),
        ];
    }
}
